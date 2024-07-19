<div class="container">
    <h2>Lista de Usuarios</h2>
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('msg'); ?>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?= $usuario['nombre']; ?></td>
                    <td><?= $usuario['apellido']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <td><?= $usuario['usuario']; ?></td>
                    <td>
                        <a href="<?= base_url('usuarios/edit/' . $usuario['id_usuario']); ?>" class="btn btn-primary">Editar</a>
                        <?php if (session()->perfil_id == 1) : ?>
                            <a href="<?= base_url('usuarios/delete/' . $usuario['id_usuario']); ?>" class="btn btn-danger">Eliminar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>