<div class="row">
    <h2 class="parrafo_principal row d-flex justify-content-center">Iniciar Sesion</h2>
    <div class="col d-flex justify-content-center" id="login">
        <!--Mensaje de error-->
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-warning">
                <? session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>
        <!--Formulario de Ingreso-->
        <div class="row">
            <form method="post" action="<?php echo base_url('/enviarlogin') ?>">
                <div class="form-group row">
                    <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1">
                </div>

                <div class="form-group row">
                    <label for="inputPassword5" class="form-label">Contraseña</label>
                    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            </form>
            &nbsp
            <div class="col-12">
                <button type="submit" class="btn btn-secondary">Ingresar</button>
                <p>¿Todavía no tienes una cuenta? <a href="<?php echo base_url('registro') ?>" id="registro_login">Registrate</a></p>
            </div>
        </div>
    </div>
</div>