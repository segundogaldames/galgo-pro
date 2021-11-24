<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Nuevo Rol</h3>
      <p>Llena los campos del formulario para registrar rol.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
  	   		<div class="form-group">
            <label>Nombre<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Nombre del rol" name="nombre" value="{$datos.nombre|default:""}">
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}roles" class="btn btn-link">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


	
	
	
