<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuario';
    protected static $idTabla = 'usu_id';
    protected static $columnasDB = ['usu_nombre', 'usu_catalogo', 'usu_password','usu_situacion'];

    public $usu_id;
    public $usu_nombre;
    public $usu_catalogo;
    public $usu_password;
    public $usu_situacion;


    public function __construct($args = [])
    {
        $this->usu_id = $args['id'] ?? null;
        $this->usu_nombre = $args['usu_nombre'] ?? '';
        $this->usu_catalogo = $args['usu_catalogo'] ?? '';
        $this->usu_password = $args['usu_password'] ?? '';
        $this->usu_situacion = $args['usu_situacion'] ?? 1;
    }

   
    public static function obtenerUsuarioconQuery()
    {
        $sql = "SELECT * FROM usuario where usu_situacion = 1";
        return self::fetchArray($sql);
    }


    public function validarUsuarioExistente(): bool
    {
        $sql = "SELECT * FROM usuario where usu_catalogo = $this->usu_catalogo";
        $resultado = static::fetchArray($sql);

        return $resultado ? true : false;
        
    }

    public function getUsuarioExistente(): array
    {
        $sql = "SELECT usu_id,usu_nombre, usu_password, usu_catalogo, rol_nombre_ct, rol_nombre from permiso inner join usuario on permiso_usuario = usu_id inner join rol on rol_id = permiso_rol inner join aplicacion on rol_app = app_id where usu_catalogo = $this->usu_catalogo";
        $resultado = static::fetchFirst($sql);
        return $resultado;
    }

    public function buscarusuario()
    {
        $sql = "SELECT * from usuario where usu_situacion = 1 ";

        if ($this->usu_nombre != '') {
            $sql .= " and usu_nombre like '%$this->usu_nombre%' ";
        }


        if ($this->usu_id != null) {
            $sql .= " and usu_id = $this->usu_id ";
        }
        return self::fetchArray($sql);

    }
}
