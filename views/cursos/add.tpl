<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Nuevo Curso</h3>
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
            <input type="text" class="form-control" placeholder="Nombre del curso" name="nombre" value="{$datos.nombre|default:""}">
          </div>
          <div class="form-group">
            <label>Docente</label>
            <select name="docente" class="form-control">
              <option value="">Selecione...</option>
              {if isset($docentes) && count($docentes)}
                {foreach from=$docentes item=d}
                  <option value="{$d.id}">{$d.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
            <label>Fecha de inicio</label>
            <input type="date" name="f_inicio" class="form-control" value="{$datos.f_inicio|default:""}">
          </div>
          <div class="form-group">
            <label>Fecha de Término</label>
            <input type="date" name="f_fin" class="form-control" value="{$datos.f_fin|default:""}">
          </div>
          <div class="form-group">
            <label>Precio</label>
            <input type="number" name="valor" class="form-control" value="{$datos.valor|default:""}">
          </div>
          <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" rows="5" style="resize: none;">{$datos.descripcion|default:""}</textarea>
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


	
	
	
