<div class="row">
    <div class="col d-flex justify-content-center" id="registro">
        <div class="row g-3">
            <h2 class="parrafo_principal">Registrarse</h2>
            <?php $validation = \Config\Services::validation(); ?>
            <form method="post" action="<?php echo base_url('enviar-form') ?>">
                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <div class="input-group">
                    <span class="input-group-text">Nombres y Apellidos</span>
                    <input name="nombre" type="text" aria-label="First name" class="form-control">
                    <?php if ($validation->getError('nombre')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('nombre'); ?>
                        </div>
                    <?php } ?>
                    <input name="apellido" type="text" aria-label="Last name" class="form-control">
                    <?php if ($validation->getError('apellido')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('apellido'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6">
                    <label for="inputUser" class="form-label">Usuario</label>
                    <input name="usuario" type="text" class="form-control" id="inputUsuario">
                    <?php if ($validation->getError('usuario')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('usuario'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="email@email.com">
                    <?php if ($validation->getError('email')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('email'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6">
                    <label for="inputPassword4" class="form-label">Contraseña</label>
                    <input name="pass" type="password" class="form-control" id="inputPassword4">
                    <?php if ($validation->getError('pass')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('pass'); ?>
                        </div>
                    <?php } ?>
                    <div id="passwordHelpBlock" class="form-text">
                        Tu contraseña debe tener entre 8-20 caracteres de longitud, puede contener letras y numeros (abc123), pero no puede contener espacios vacios ni caracteres especiales (,.-)
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</div>
