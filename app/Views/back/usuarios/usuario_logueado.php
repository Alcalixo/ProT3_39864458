<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-waring">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
        </div>
        <br><br>
        <?php if (session()->perfil_id == 1) : ?>
            <div>
                <img class="center" height="100px" width="100px" src="<?php echo base_url('/') ?>" alt="Administrador">
            </div>
        <?php elseif (session()->perfil_id == 2) : ?>
            <div>
                <img class="center" height="80px" width="80px" src="<?php echo base_url('/') ?>" alt="Usuario">
            </div>
        <?php endif ?>
    </div>
</div>