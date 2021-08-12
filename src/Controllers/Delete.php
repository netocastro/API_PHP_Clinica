<?php

namespace Source\Controllers;

use Source\Models\Pacientes;

class Delete
{
      public function deletePaciente($data)
      {
            $paciente = (new Pacientes())->findById($data['id']);
            if ($paciente) {
                  $paciente->destroy();
                  echo json_encode('apagado');
            }
      }
}
