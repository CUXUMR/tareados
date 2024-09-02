<?php

use Model\Usuario;

$usuario = new Usuario($_GET);
$usuarios = $usuario->buscarusuario();

use Model\Rol;

$rol = new Rol($_GET);
$roles = $rol->buscarrol();
?>

<h1 class="text-center">Formulario de permisos</h1>
<div class="row justify-content-center mb-4">
    <form id="formPermiso" class="border shadow p-4 col-lg-4">
        <input type="hidden" name="permiso_id" id="permiso_id">
        <div class="row mb-3">
            <label for="permiso_usuario">Usuarios</label>
            <select name="permiso_usuario" id="permiso_usuario" class="form-control">
                <option value="">SELECCIONE...</option>
                <?php foreach ($usuarios as $usuario) : ?>
                    <option value="<?= $usuario['usu_id'] ?>"> <?= $usuario['usu_nombre'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="row mb-3">
            <label for="permiso_rol">roles</label>
            <select name="permiso_rol" id="permiso_rol" class="form-control">
                <option value="">SELECCIONE...</option>
                <?php foreach ($roles as $rol) : ?>
                    <option value="<?= $rol['rol_id'] ?>"> <?= $rol['rol_nombre'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>


</div>




<div class="row">
    <div class="col table-responsive">
        <table class="table table-bordered table-hover" id="tablaPermiso">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Usuarios</th>
                    <th>roles</th>
                    <th>modificar</th>
                    <th>eliminar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/permiso/index.js') ?>"></script>