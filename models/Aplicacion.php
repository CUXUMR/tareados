<?php

namespace Model;

class Aplicacion extends ActiveRecord
{
    protected static $tabla = 'Aplicacion';
    protected static $idTabla = 'app_id';
    protected static $columnasDB = ['app_nombre','app_situacion'];

    public $app_id;
    public $app_nombre;
    public $app_situacion;


    public function __construct($args = [])
    {
        $this->app_id = $args['app_id'] ?? null;
        $this->app_nombre = $args['app_nombre'] ?? '';
        $this->app_situacion = $args['app_situacion'] ?? 1;
    }

    public static function obtenerAplicacionsconQuery()
    {
        $sql = "SELECT * FROM Aplicacion where app_situacion = 1";
        return self::fetchArray($sql);
    }

    public function buscarapp()
    {
        $sql = "SELECT * from aplicacion where app_situacion = 1 ";

        if ($this->app_nombre != '') {
            $sql .= " and app_nombre like '%$this->app_nombre%' ";
        }


        if ($this->app_id != null) {
            $sql .= " and app_id = $this->app_id ";
        }
        return self::fetchArray($sql);

    }


}
