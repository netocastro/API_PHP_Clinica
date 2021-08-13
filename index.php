<?php

use Source\Models\Medicos;
use Stonks\Router\Router;

require __DIR__ ."/vendor/autoload.php";  




$router = New Router(BASE_PATH);

$router->namespace('Source\Controllers');

$router->group(null);

$router->get('/',function ()
{


      print_r((new Medicos())->data());
      $data = [];
      $data['nome'] = "hfjhjfdf";
      $data['crm'] = "88";
      $data['id'] = "10";


      foreach ($data as $key => $value) {
            echo "key: " . $key . "<br>";
            echo "value: " . $value. "<br><br>";
            echo 'datakey:' . $data[$key]. "<br>";

      }

     /* var_dump((new Medicos())->findById(5)->data());
     $objectModel = (new Medicos())->findById(5);
      foreach ($objectModel->data() as $key => $value) {
            echo "key: " . $key . "<br>";
            echo "value: " . $value. "<br>";
            if(isset($data[$key])){
                  $objectModel->$key = $data[$key];
            }
      }
      $objectModel->change()->save();

      if($objectModel->fail()){
            echo json_encode($objectModel->fail()->getMessage());
      }else{
            echo json_encode("salvo");
      }

      echo "<br><br><br>";

      var_dump((new Medicos())->findById(5)->data());*/


});

/**
 * GET
 */
//$router->get('/pacientes','Get:getPacientes','get.pacientes');
//$router->get('/medicos','Get:getPacientes','get.pacientes');
$router->get('/{$model}','Get:getTables','get.tables');

/**
 * POST
 */
//$router->post('/pacientes','Post:postPaciente','post.paciente');
//$router->post('/medicos','Post:postMedico','post.medico');
$router->post('/{$model}','Post:inserir','post.insert');

/**
 * PUT
 */
//$router->put('/pacientes','Put:putPaciente','put.paciente');
$router->put('/{$model}','Put:atualizar','put.atualizar');

/**
 * DELETE
 */
$router->delete('/pacientes','Delete:deletePaciente','delete.paciente');

$router->dispatch();

if($router->error()){
      echo "<strong>Error: </strong> {$router->error()}";
}