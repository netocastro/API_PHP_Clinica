<?php

namespace Source\Controllers;

class Get
{
      public function getTables()
      {
            $nomeClasse = ucfirst(preg_replace('([\/])', '', $_GET['route']));

            $classe = "\Source\Models\\{$nomeClasse}";

            echo json_encode(objectToArray((new $classe())->find()->fetch(true)));
      }
}
