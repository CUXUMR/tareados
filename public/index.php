<?php 
require_once __DIR__ . '/../includes/app.php';

use Controllers\AplicacionController;
use MVC\Router;
use Controllers\AppController;
use Controllers\PermisoController;
use Controllers\RolController;
use Controllers\UsuarioController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);







//usuarios

$router->get('/usuario', [UsuarioController::class,'index']);
$router->post('/API/usuario/guardar', [UsuarioController::class,'guardarAPI']);
$router->post('/API/usuario/modificar', [UsuarioController::class,'modificarAPI']);
$router->get('/API/usuario/buscar', [UsuarioController::class,'buscarAPI']);
$router->post('/API/usuario/eliminar', [UsuarioController::class,'eliminarAPI']);


//aplicaciones
$router->get('/aplicacion', [AplicacionController::class,'index']);
$router->post('/API/aplicacion/guardar', [AplicacionController::class,'guardarAPI']);
$router->post('/API/aplicacion/modificar', [AplicacionController::class,'modificarAPI']);
$router->get('/API/aplicacion/buscar', [AplicacionController::class,'buscarAPI']);
$router->post('/API/aplicacion/eliminar', [AplicacionController::class,'eliminarAPI']);

//roles
$router->get('/rol', [RolController::class,'index']);
$router->post('/API/rol/guardar', [RolController::class,'guardarAPI']);
$router->post('/API/rol/modificar', [RolController::class,'modificarAPI']);
$router->get('/API/rol/buscar', [RolController::class,'buscarAPI']);
$router->post('/API/rol/eliminar', [RolController::class,'eliminarAPI']);


//permisos
$router->get('/permiso', [PermisoController::class,'index']);
$router->post('/API/permiso/guardar', [PermisoController::class,'guardarAPI']);
$router->post('/API/permiso/modificar', [PermisoController::class,'modificarAPI']);
$router->get('/API/permiso/buscar', [PermisoController::class,'buscarAPI']);
$router->post('/API/permiso/eliminar', [PermisoController::class,'eliminarAPI']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
