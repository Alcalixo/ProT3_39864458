<div class="container">
    <h2>Editar Usuario</h2>
    <form action="<?= base_url('usuarios/edit/' . $usuario['id_usuario']); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $usuario['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?= $usuario['apellido']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $usuario['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" class="form-control" value="<?= $usuario['usuario']; ?>" required>
        </div>
        <div class="form-group">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" class="form-control">
        </div>
        <?php if (session()->perfil_id == 1) : ?>
            <div class="form-group">
                <label for="perfil_id">Perfil</label>
                <select name="perfil_id" class="form-control" required>
                    <option value="1" <?= $usuario['perfil_id'] == 1 ? 'selected' : ''; ?>>Administrador</option>
                    <option value="2" <?= $usuario['perfil_id'] == 2 ? 'selected' : ''; ?>>Usuario</option>
                </select>
            </div>
            <div class="form-group">
                <label for="baja">Baja</label>
                <select name="baja" class="form-control" required>
                    <option value="NO" <?= $usuario['baja'] == 'NO' ? 'selected' : ''; ?>>No</option>
                    <option value="SI" <?= $usuario['baja'] == 'SI' ? 'selected' : ''; ?>>Sí</option>
                </select>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>