<?php

namespace Controllers;

use Exception;
use Model\Usuario;
use MVC\Router;

class UsuarioController
{
    public static function index(Router $router)
    {
        $usuario = Usuario::find(2);
        $router->render('usuario/index', [
            'usuario' => $usuario
        ]);
    }


    public static function guardarAPI()
    {
        getHeadersApi();
        $_POST['usu_nombre'] = htmlspecialchars($_POST['usu_nombre']);
        $_POST['usu_catalogo'] = filter_var($_POST['usu_catalogo'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['usu_password'] = htmlspecialchars($_POST['usu_password']);
        $_POST['usu_password2'] = htmlspecialchars($_POST['usu_password2']);

        if ($_POST['usu_password'] != $_POST['usu_password2']) {
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Las constraseñas no coinciden',
                'detalle' => 'Verifique las contraseñas ingresadas',
            ]);
            exit;
        }

        try {
            $_POST['usu_password'] = password_hash($_POST['usu_password'], PASSWORD_DEFAULT);
            $usuario = new Usuario($_POST);
            if ($usuario->validarUsuarioExistente()) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Ya existe un usuario registrado con este catalogo',
                    'detalle' => 'Verifique la información',
                ]);
                exit;
            }

            $usuario->crear();
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Usuario creado exitosamente',

            ]);
            exit;
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al generar usuario',
                'detalle' => $e->getMessage(),
            ]);
            exit;
        }
    }

    public static function buscarAPI()
    {
        try {
            // ORM - ELOQUENT
            // $usuario = Producto::all();
            $usuario = Usuario::obtenerUsuarioconQuery();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Datos encontrados',
                'detalle' => '',
                'datos' => $usuario
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar usuario',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function modificarAPI()
    {

        $_POST['usu_nombre'] = htmlspecialchars($_POST['usu_nombre']);
        $_POST['usu_catalogo'] = filter_var($_POST['usu_catalogo'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['usu_password'] = htmlspecialchars($_POST['usu_password']);
        $_POST['usu_password2'] = htmlspecialchars($_POST['usu_password2']);

        if ($_POST['usu_password'] != $_POST['usu_password2']) {
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Las constraseñas no coinciden',
                'detalle' => 'Verifique las contraseñas ingresadas',
            ]);
            exit;
        }

        try {
            $_POST['usu_password'] = password_hash($_POST['usu_password'], PASSWORD_DEFAULT);
            $usuario = Usuario::find($_POST['usu_id']);
            $usuario->sincronizar($_POST);
            $usuario->actualizar();

            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Usuario modificado exitosamente',

            ]);
            exit;
        
        }catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al modificar producto',
                'detalle' => $e->getMessage(),
            ]);
        }
    
    }

    public static function eliminarAPI()
    {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $usuario = Usuario::find($id);
            // $producto->sincronizar([
            //     'situacion' => 0
            // ]);
            // $producto->actualizar();
            $usuario->eliminar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'usuario eliminado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al eliminado usuario',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}
