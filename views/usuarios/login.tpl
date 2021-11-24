<div id="tf-contact">
    <div class="container">
        <div class="section-title">
          <h3>Iniciar Sesión</h3>
          <p>Llena los campos del formulario para iniciar sesión.</p>
          <p class="text-danger">* Campos obligatorios</p>
          <hr>
        </div>

            <div class="space"></div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form id="contact" action="" method="post">
                      <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Tu correo electrónico" name="email" value="{$datos.email|default:""}">
                      </div>
                      <div class="form-group">
                      	<label>Password (8 caracteres como mínimo) <span class="text-danger">*</span></label>
                      	<input type="password" name="password" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="enviar" value="{$enviar}">
                        <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
                      </div>
                    </form>
                </div>
            </div>
        </div>




