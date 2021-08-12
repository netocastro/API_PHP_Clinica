<?php

namespace Source\Controllers;

use Source\Models\Pacientes;

class Post  
{
      public function postPaciente($data)
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
}
