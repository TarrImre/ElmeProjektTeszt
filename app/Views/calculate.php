    <form method="post" action="<?php base_url('Calculate/add') ?>">
        <?= $apiRead ?>
        <?= $hiba ?>
        <div class="container square-box d-flex flex-row flex-wrap justify-content-center align-items-center">
            <div class="container text-center">
                <div class="textpurple mt-3"><?= $vetel_eladas_USD ?><br><?= $vetel_eladas_EUR ?></div>
            </div>
            <div class="col-12 col-md-6 p-2">
                <div class="p-2">
                    <div class="form-group pb-2">
                        <input type="number" name="num1" min="1" id="field1" oninput="hideField()" class="form-control" placeholder="<?= $vegeredmeny2 ?>">
                    </div>
                    <div class="form-group pb-2">
                        <select name="valutaNames1" class="form-control">
                            <option value="ZERO" selected="selected">Valuták</option>
                            <?php penznem(); ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="buttonFrom1" id="button1" oninput="hideField()" class="btn btnpurple mt-2">Átvált</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 p-2">
                <div class="p-2">
                    <div class="form-group pb-2">
                        <input type="number" min="1" name="num2" id="field2" oninput="hideField()" class="form-control" placeholder="<?= $vegeredmeny1 ?>">
                    </div>
                    <div class="form-group pb-2">
                        <select name="valutaNames2" class="form-control">
                            <option value="ZERO" selected="selected">Valuták</option>
                            <?php penznem(); ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="buttonFrom2" id="button2" oninput="hideField()" class="btn btnpurple mt-2">Átvált</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        function penznem()
        {
            $db = db_connect();
            $query   = $db->query('SELECT * FROM currencies ORDER BY penznem ASC');
            $results = $query->getResultArray();
            foreach ($results as $row) {
                echo '<option value="' . $row['penznem'] . '">' . $row['penznem'] . '</option>';
            }
        }
        ?>
    </form>