<?php

use Stonks\Router\Router;

require __DIR__ ."/vendor/autoload.php";  

$router = New Router(BASE_PATH);

$router->namespace('Source\Controllers');

$router->group(null);

/**
 * GET
 */
$router->get('/pacientes','Get:getPacientes','get.pacientes');

/**
 * POST
 */
$router->post('/pacientes','Post:postPaciente','post.paciente');

/**
 * PUT
 */
$router->put('/pacientes','Put:putPaciente','put.paciente');

/**
 * DELETE
 */
$router->delete('/pacientes','Delete:deletePaciente','delete.paciente');

$router->dispatch();

if($router->error()){
      echo "<strong>Error: </strong> {$router->error()}";
}