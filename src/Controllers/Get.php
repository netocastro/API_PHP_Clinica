<?php

namespace Source\Controllers;

class Get
{
     /* public function getPacientes($data)
      {

            $nomeClasse = ucfirst(preg_replace('([\/])', '',$_GET['route']) );
  
            $classe = "\Source\Models\\".  $nomeClasse;

            echo json_encode(objectToArray((new $classe())->find()->fetch(true)));
      }*/

      public function getTables($data)
      {

            $nomeClasse = ucfirst(preg_replace('([\/])', '',$_GET['route']) );
  
            $classe = "\Source\Models\\{$nomeClasse}";

            echo json_encode(objectToArray((new $classe())->find()->fetch(true)));
      }

      
}
