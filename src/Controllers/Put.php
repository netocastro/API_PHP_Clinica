<?php

namespace Source\Controllers;

class Put
{
      public function atualizar($data)
      {
            $nomeClasse = ucfirst($data['tabela']);

            $classe = "\Source\Models\\{$nomeClasse}";

            $objectModel = (new $classe())->findById($data['id']);

            foreach ($objectModel->data() as $key => $value) {

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
