<?php

namespace Controllers;

use Exception;
use Model\Permiso;
use MVC\Router;

class PermisoController
{
    public static function index(Router $router)
    {
        $permisos = Permiso::find(2);
        $router->render('permiso/index', [
            'permisos' => $permisos
        ]);
    }
   

    public static function guardarAPI()
    {
        $_POST['permiso_usuario'] = htmlspecialchars($_POST['permiso_usuario']);
        $_POST['permisp_rol'] = htmlspecialchars($_POST['permisp_rol']);
     
        try {
            $permiso = new Permiso($_POST);
            $resultado = $permiso->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Permiso guardado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar permiso',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarAPI()
    {
        try {
            // ORM - ELOQUENT
            // $productos = Producto::all();
            $permiso = Permiso::obtenerPermisoconQuery();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Datos encontrados',
                'detalle' => '',
                'datos' => $permiso
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar permisos',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
    
    public static function modificarAPI()
    {
        $_POST['permiso_usuario'] = htmlspecialchars($_POST['permiso_usuario']);
        $_POST['permiso_rol'] = htmlspecialchars($_POST['permiso_rol']);
        $id = filter_var($_POST['permiso_id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $permiso = Permiso::find($id);
            echo json_encode($permiso);
            $permiso->sincronizar($_POST);
            $permiso->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'permiso modificado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al modificar permiso',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function eliminarAPI()
    {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $permiso = Permiso::find($id);
            // $producto->sincronizar([
            //     'situacion' => 0
            // ]);
            // $producto->actualizar();
            $permiso->eliminar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'permiso eliminado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al eliminado permiso',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}
