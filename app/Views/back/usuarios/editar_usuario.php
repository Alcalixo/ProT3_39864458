<div class="container">
    <h2>Editar Usuario</h2>
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form action="<?= base_url('/usuarios/edit/' . $usuario['id_usuario']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= $usuario['nombre'] ?>">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="<?= $usuario['apellido'] ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $usuario['email'] ?>">
        </div>
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" name="usuario" value="<?= $usuario['usuario'] ?>">
        </div>
        <?php if (session()->get('perfil_id') == 1): ?>
            <div class="form-group">
                <label for="perfil_id">Perfil</label>
                <select class="form-control" name="perfil_id">
                    <option value="1" <?= ($usuario['perfil_id'] == 1 ? 'selected' : '') ?>>Administrador</option>
                    <option value="2" <?= ($usuario['perfil_id'] == 2 ? 'selected' : '') ?>>Usuario</option>
                </select>
            </div>
            <div class="form-group">
                <label for="baja">Estado</label>
                <select class="form-control" name="baja">
                    <option value="0" <?= ($usuario['baja'] == 0 ? 'selected' : '') ?>>Activo</option>
                    <option value="1" <?= ($usuario['baja'] == 1 ? 'selected' : '') ?>>Inactivo</option>
                </select>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>