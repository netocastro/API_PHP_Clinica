<?php

namespace Source\Controllers;

class Post
{
      public function inserir($data)
      {
            $nomeClasse = ucfirst($data['tabela']);

            $classe = "\Source\Models\\{$nomeClasse}";

            $objectModel = new $classe();

            foreach ($data as $key => $value) {
                  if($key != 'tabela' && $key != 'id'){
                        $objectModel->$key = $data[$key];  
                  }
            }

            $objectModel->save();

            if ($objectModel->fail()) {
                  echo json_encode($objectModel->fail()->getMessage());
            } else {
                  echo json_encode("salvo");
            }
      }
}
