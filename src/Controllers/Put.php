<?php

namespace Source\Controllers;

use Source\Models\Pacientes;

class Put
{
      public function putPaciente($data)
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
      }
}
