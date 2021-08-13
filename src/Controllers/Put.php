<?php

namespace Source\Controllers;

use Source\Models\Pacientes;

class Put
{
   /*   public function putPaciente($data)
      {
            $pacientes = (new Pacientes())->findById($data['id']);
            if ($pacientes) {
                  $pacientes->nome = $data['nome'];
                  $pacientes->cpf = $data['cpf'];
      
                  $pacientes->change()->save();

                  if ($pacientes->fail()) {
                        echo json_encode($pacientes->fail()->getMessage());
                        return;
                  } else {
                        echo json_encode("atualizado");
                  }
            }else{
                  echo json_encode(' NAO existe cliente'); 
            }
      }*/

      public function atualizar($data)
      {
            //echo json_encode($data['tabela']);  exit;


            $nomeClasse = ucfirst($data['tabela']);

            $classe = "\Source\Models\\{$nomeClasse}";


            //echo json_encode(objectToArray((new $classe())->findById($data['id'])));exit;


            $objectModel = (new $classe())->findById($data['id']);
            foreach ($objectModel->data() as $key => $value) {
                  //echo "key: " . $key . "<br>";
                 // echo "value: " . $value . "<br>";
                  if (isset($data[$key])) {
                        $objectModel->$key = $data[$key];
                  }
            }
            $objectModel->change()->save();

            if ($objectModel->fail()) {
                  echo json_encode($objectModel->fail()->getMessage());
            } else {
                  echo json_encode("atualizado");
            }
      }
}
