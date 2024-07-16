<div class="row">
    <div class="col d-flex justify-content-center" id="registro">
        <!--Formulario de Registro-->
        <form class="row g-3">
            <p class="parrafo_principal">Completa tus datos</p>
            <div class="input-group">
                <span class="input-group-text">Nombres y Apellidos</span>
                <input type="text" aria-label="First name" class="form-control">
                <input type="text" aria-label="Last name" class="form-control">
            </div>
            <div class="col-lg-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="email@email.com">
            </div>
            <div class="col-lg-6">
                <label for="inputPassword4" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword4">
                <div id="passwordHelpBlock" class="form-text">
                    Tu contraseña debe tener entre 8-20 caracteres de longitud, puede contener letras y numeros (abc123), pero no puede contener espacios vacios ni caractereres especiales (,.-)
                </div>
            </div>
            <div class="col-lg-6">
                <label for="inputPassword4" class="form-label">Repite tu Contraseña</label>
                <input type="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-lg-6">
                <label for="inputCity" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="inputCiudad">
            </div>
            <div class="col-lg-6">
                <label for="inputAdress" class="form-label">País</label>
                <input type="text" class="form-control" id="inputPais">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Estoy de acuerdo con los terminos y condiciones
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary">Registrarse</button>
            </div>
        </form>
    </div>
</div>