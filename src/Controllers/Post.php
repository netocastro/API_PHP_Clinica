<?php

namespace Source\Controllers;

use Source\Models\Medicos;
use Source\Models\Pacientes;

class Post
{

      public function inserir($data)
      {
            //echo json_encode($data['tabela']);  exit;


            $nomeClasse = ucfirst($data['tabela']);

            $classe = "\Source\Models\\{$nomeClasse}";


            //echo json_encode(objectToArray((new $classe())->findById($data['id'])));exit;


            $objectModel = new $classe();

            foreach ($data as $key => $value) {
                  $objectModel->key = $data[$key]; 
            }

           /* foreach ($objectModel->data() as $key => $value) {
                  //echo "key: " . $key . "<br>";
                 // echo "value: " . $value . "<br>";
                  if (isset($data[$key])) {
                        $objectModel->$key = $data[$key];
                  }
            }*/
            $objectModel->save();

            if ($objectModel->fail()) {
                  echo json_encode($objectModel->fail()->getMessage());
            } else {
                  echo json_encode("salvo");
            }
      }

      /* public function postPaciente($data)
      {
            $paciente = new Pacientes();

            $paciente->nome = $data['nome'];
            $paciente->cpf = $data['cpf'];
            $paciente->save();

            if($paciente->fail()){
                  echo json_encode($paciente->fail()->getMessage());
            }else{
                  echo json_encode("salvo");
            }
      }

      public function postMedico($data)
      {
            $medico = new Medicos();

            $medico->nome = $data['nome'];
            $medico->crm = $data['crm'];
            $medico->save();

            if($medico->fail()){
                  echo json_encode($medico->fail()->getMessage());
            }else{
                  echo json_encode("salvo");
            }
      }*/
}
