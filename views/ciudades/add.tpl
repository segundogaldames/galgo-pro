<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Nueva Ciudad</h3>
      <p>Llena los campos del formulario para registrar ciudades.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
          <div class="form-group">
            <label>Región {$region.nombre}</label>
          </div>
          <div class="form-group">
            <label>Ciudad o Comuna<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Nombre de la ciudad o comuna" name="nombre" value="{$datos.nombre|default:""}">
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}ciudades" class="btn btn-link">Volver</a>
          </div>     
        </form>
      </div>
    </div>
  </div>
</div>
