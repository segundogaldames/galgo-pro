<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Nueva Clase</h3>
      <p>Llena los campos del formulario para registrar una clase.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
          <div class="form-group">
            <label>Curso: {ucwords($curso.nombre)}</label>
          </div>
  	   		<div class="form-group">
            <label>Título<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Titulo de la clase" name="titulo" value="{$datos.titulo|default:""}">
          </div>
          <div class="form-group">
            <label>Descripción<span class="text-danger">*</span></label>
            <textarea name="descripcion" class="form-control" rows="5" style="resize: none;">{$datos.descripcion|default:""}</textarea>
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}cursos/view/{$curso.id}" class="btn btn-link">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


	
	
	
