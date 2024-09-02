<h1 class="text-center">Registro de usuarios</h1>
<div class="row justify-content-center">
    <form class="col-lg-4 border rounded shadow p-3 mb-3" id="formUsuario">
        <input type="hidden" name="usu_id" id="usu_id" class="form-control">
        <div class="row mb-3">
            <div class="col">
                <label for="usu_nombre">Nombre del usuario</label>
                <input type="text" name="usu_nombre" id="usu_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="usu_catalogo">Catálogo del usuario</label>
                <input type="number" name="usu_catalogo" id="usu_catalogo" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="usu_password">Password</label>
                <input type="password" name="usu_password" id="usu_password" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="usu_password2">Confirmar Password</label>
                <input type="password" name="usu_password2" id="usu_password2" class="form-control">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <button type="button" id="btnGuardar" class="btn btn-primary w-100">Registrar</button>
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
        <table class="table table-bordered table-hover" id="tablaUsuario">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Nombre</th>
                    <th>catalogo</th>
                    <th>password</th>
                    <th>modificar</th>
                    <th>eliminar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/usuario/index.js') ?>"></script>