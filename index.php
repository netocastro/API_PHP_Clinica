<?php

use Source\Models\Medicos;
use Stonks\Router\Router;

require __DIR__ ."/vendor/autoload.php";  

$router = New Router(BASE_PATH);

$router->namespace('Source\Controllers');

$router->group(null);

/**
 * GET
 */

$router->get('/{$model}','Get:getTables','get.tables');

/**
 * POST
 */

$router->post('/{$model}','Post:inserir','post.insert');

/**
 * PUT
 */

$router->put('/{$model}','Put:atualizar','put.atualizar');

/**
 * DELETE
 */
$router->delete('/{$model}','Delete:delete','delete.delete');

$router->dispatch();

if($router->error()){
      echo "<strong>Error: </strong> {$router->error()}";
}