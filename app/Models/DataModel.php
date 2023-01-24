<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use PhpParser\Node\Stmt\Foreach_;

class DataModel
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    function all()
    {
        return $this->db->table('currencies')->get()->getResult();
    }

    public function getFromAPI($bank, $datum, $penznem, $vetel, $eladas)
    {
        $data = [
            'bank'  => $bank,
            'datum'  => $datum,
            'penznem'  => $penznem,
            'vetel'  => $vetel,
            'eladas'  => $eladas,
        ];
        return $this->db->table('currencies')->insert($data);
    }

    public function deleteTable()
    {
        return $this->db->table('currencies')->truncate();
    }
}
