<?php

namespace Source\Controllers;

use Source\Models\Pacientes;

class Get  
{
      public function getPacientes()
      {
           echo json_encode(objectToArray((new Pacientes())->find()->fetch(true)));
      }
}
