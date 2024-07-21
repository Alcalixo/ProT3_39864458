<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>
        </div>
        <br><br>
        <?php if (session()->perfil_id == 1) : ?>
            <div>
                <img class="center" height="250px" src="<?php echo base_url('/assets/img/administrador.jpg') ?>" alt="Administrador">
            </div>
        <?php elseif (session()->perfil_id == 2) : ?>
            <div>
                <img class="center" height="250px"  src="<?php echo base_url('/assets/img/usuario.png') ?>" alt="Usuario">
            </div>
        <?php endif ?>
    </div>
</div>