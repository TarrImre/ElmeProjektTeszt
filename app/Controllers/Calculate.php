<?php

namespace App\Controllers;

use App\Models\DataModel;

class Calculate extends BaseController
{

    //szamitas masodik_vetel/elso_eladas*amennyit
    public function index()
    {
        helper(['form']);

        $currency1 = $this->request->getPost('valutaNames1');
        $currency2 = $this->request->getPost('valutaNames2');

        $number1 = $this->request->getPost('num1');
        $number2 = $this->request->getPost('num2');

        $buttonForm1 = $this->request->getPost('buttonFrom1');
        $buttonForm2 = $this->request->getPost('buttonFrom2');

        $result1 = "Érték";
        $result2 = "Érték";
        $hiba = "";

        // Második block
        if (isset($buttonForm2)) {
            if (!empty($currency1)) {
                if (!empty($this->request->getPost('num2'))) {
                    if ($currency1 == "ZERO" || $currency2 == "ZERO") {
                        $hiba = $this->errorMessage("Válassz pénznemet!");
                    } else if ($currency1 == $currency2) {
                        $result2 = $number2 . " " . $currency2;
                        $result1 = $number2 . " " . $currency2;
                        //$hiba = $this->questionMessage("Ugyanaz a pénznem!");
                    } else {
                        $result2 = number_format($this->secondCurrencyValue($currency2) / $this->firstCurrencyValue($currency1) * $number2, 2) . " " . $currency1;
                        $result1 = $number2 . " " . $currency2;
                    }
                } else {
                    $hiba = $this->errorMessage("Adjon meg összeget!");
                }
            }
        }

        // Első block
        if (isset($buttonForm1)) {
            if (!empty($currency2)) {
                if (!empty($this->request->getPost('num1'))) {
                    if ($currency2 == "ZERO" || $currency1 == "ZERO") {
                        $hiba = $this->errorMessage("Válassz pénznemet!");
                    } else if ($currency2 == $currency1) {
                        $result1 = $number1 . " " . $currency1;
                        $result2 = $number1 . " " . $currency1;
                        //$hiba = $this->questionMessage("Ugyanaz a pénznem!");
                    } else {
                        $result1 = number_format($this->secondCurrencyValue($currency1) / $this->firstCurrencyValue($currency2) * $number1, 2) . " " . $currency2;
                        $result2 = $number1 . " " . $currency1;
                    }
                } else {
                    $hiba = $this->errorMessage("Adjon meg összeget!");
                }
            }
        }


        $data = [
            'apiRead' => $this->apiReadCurrency(),
            'vegeredmeny1' => $result1,
            'vegeredmeny2' => $result2,
            'hiba' => $hiba,
            'vetel_eladas_EUR' => $this->db_Read_EUR_USD("EUR"),
            'vetel_eladas_USD' => $this->db_Read_EUR_USD("USD"),
        ];

        echo view('header');
        echo view('calculate', $data);
        echo view('footer');
    }

    public function db_Read_EUR_USD($currency)
    {
        $db_penznem = "";
        $db = db_connect();
        $query   = $db->query('SELECT penznem,vetel,eladas FROM currencies');
        $results = $query->getResultArray();
        foreach ($results as $row) {
            $db_penznem = $row['penznem'];
            if ($db_penznem == $currency) {
                return $db_penznem . " " . 'Vétel: ' . number_format($row['vetel'], 2) . " " . 'Eladás: ' . number_format($row['eladas'], 2);
            }
        }
    }

    public function firstCurrencyValue($currency1)
    {
        $db_penznem  = "";
        $db_eladas = "";
        $db = db_connect();
        $query   = $db->query('SELECT * FROM currencies');
        $results = $query->getResultArray();
        foreach ($results as $row) {
            $db_penznem = $row['penznem'];
            $db_eladas = $row['eladas'];
            if ($db_penznem == $currency1) {
                return $db_eladas;
            }
        }
    }

    public function secondCurrencyValue($currency2)
    {
        $db_penznem  = "";
        $db_vetel = "";
        $db = db_connect();
        $query   = $db->query('SELECT * FROM currencies');
        $results = $query->getResultArray();
        foreach ($results as $row) {
            $db_penznem = $row['penznem'];
            $db_vetel = $row['vetel'];
            if ($db_penznem == $currency2) {
                return $db_vetel;
            }
        }
    }

    public function errorMessage($message)
    {
        $popup =
            "<script type='text/javascript'>

        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '$message'
            })
        });
        
        </script>";
        return $popup;
    }
    public function questionMessage($message)
    {
        $popup =
            "<script type='text/javascript'>

        $(document).ready(function() {
            Swal.fire(
                '$message',
                ' ',
                'question'
              )
        });
        
        </script>";
        return $popup;
    }


    //A K&H árfolyamait használtam
    public function apiReadCurrency()
    {
        $xml = simplexml_load_file("http://api.napiarfolyam.hu/?bank=kh") or die("Hiba");
        foreach ($xml->valuta->item as $item) {
            $db = db_connect();
            $query   = $db->query('SELECT * FROM currencies');
            $results = $query->getResultArray();
            foreach ($results as $row) {
                $db_datum = $row['datum'];
            }
            //Akkor "frissít", ha nem egyezik meg az adatbázisban lévő dátum és az api-ban lévő dátum
            if ($db_datum != $item->datum) {
                $this->deleteTable();
                foreach ($xml->valuta->item as $item) {
                    $this->joinTable($item->bank, $item->datum, $item->penznem, $item->vetel, $item->eladas);
                }
            }
        }
    }



    public function joinTable($bank, $datum, $penznem, $vetel, $eladas)
    {
        $db = db_connect();
        $model = new DataModel($db);
        $result = $model->getFromAPI($bank, $datum, $penznem, $vetel, $eladas);
        return $result;
    }
    public function deleteTable()
    {
        $db = db_connect();
        $model = new DataModel($db);
        $result = $model->deleteTable();
        return $result;
    }
}
