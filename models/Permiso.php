<?php

namespace Model;

class Permiso extends ActiveRecord
{
    protected static $tabla = 'permiso';
    protected static $idTabla = 'permiso_id';
    protected static $columnasDB = ['permiso_usuario', 'permiso_rol', 'permiso_situacion'];

    public $permiso_id;
    public $permiso_usuario;
    public $permiso_rol;
    public $permiso_situacion;


    public function __construct($args = [])
    {
        $this->permiso_id = $args['permiso_id'] ?? null;
        $this->permiso_usuario = $args['permiso_usuario'] ?? '';
        $this->permiso_rol = $args['permiso_rol'] ?? 0;
        $this->permiso_situacion = $args['permiso_situacion'] ?? 1;
    }

    public static function obtenerPermisoconQuery()
    {
        $sql = "SELECT * FROM permiso where permiso_situacion = 1";
        return self::fetchArray($sql);
    }

  
}
