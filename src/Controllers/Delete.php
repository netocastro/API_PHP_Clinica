<?php

namespace Source\Controllers;

class Delete
{
      public function delete($data)
      {
            $nomeClasse = ucfirst($data['tabela']);

            $classe = "\Source\Models\\{$nomeClasse}";
      
            $objectModel = (new $classe())->findById($data['id']);

            if ($objectModel) {

                  $objectModel->destroy();

                  if ($objectModel->fail()) {
                        echo json_encode($objectModel->fail()->getMessage());
                  } 

                  echo json_encode('apagado');
                  
            }else{
                  echo json_encode('usuario nao encontrado');
            }
      }
}
