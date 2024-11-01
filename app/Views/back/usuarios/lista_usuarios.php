<div class="container">
    <h2>Lista de Usuarios</h2>
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Inactivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $usuario) : ?>
                <tr>
                    <td><?= $usuario['id_usuario'] ?></td>
                    <td><?= $usuario['nombre'] ?></td>
                    <td><?= $usuario['apellido'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['usuario'] ?></td>
                    <td><?= $usuario['perfil_id'] ?></td>
                    <td><?= $usuario['baja'] ?></td>
                    <td>
                        <a href="<?= base_url('/usuarios/edit/' . $usuario['id_usuario']) ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= base_url('/usuarios/delete/' . $usuario['id_usuario']) ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>