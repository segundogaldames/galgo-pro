<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Nueva Matrícula</h3>
      <p>Llena los campos del formulario para registrar rol.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
  	   		<div class="form-group">
            <label>Estudiante<span class="text-danger">*</span></label>
            <select name="estudiante" class="form-control">
              <option value="">Seleccione...</option>
              {if isset($estudiantes) && count($estudiantes)}
                {foreach from=$estudiantes item=est}
                  <option value="{$est.id}">{$est.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}cursos" class="btn btn-link">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


	
	
	
