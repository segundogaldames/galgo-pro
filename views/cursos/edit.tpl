<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Editar Curso</h3>
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
            <input type="text" class="form-control" placeholder="Nombre del curso" name="nombre" value="{$dato.nombre|default:""}">
          </div>
          <div class="form-group">
            <label>Especialidad<span class="text-danger">*</span></label>
            <select name="especialidad" class="form-control">
              <option value="{$dato.especialidad_id}">{$dato.especialidad}</option>
              {if isset($especialidades) && count($especialidades)}
                {foreach from=$especialidades item=es}
                  <option value="{$es.id}">{$es.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
            <label>Docente<span class="text-danger">*</span></label>
            <select name="docente" class="form-control">
              <option value="{$dato.docente_id}">{$dato.docente}</option>
              {if isset($docentes) && count($docentes)}
                {foreach from=$docentes item=d}
                  <option value="{$d.id}">{$d.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
            <label>Fecha de inicio<span class="text-danger">*</span></label>
            <input type="date" name="f_inicio" class="form-control" value="{$dato.fecha_inicio|default:""}">
          </div>
          <div class="form-group">
            <label>Fecha de Término<span class="text-danger">*</span></label>
            <input type="date" name="f_fin" class="form-control" value="{$dato.fecha_fin|default:""}">
          </div>
          <div class="form-group">
            <label>Precio<span class="text-danger">*</span></label>
            <input type="number" name="valor" class="form-control" value="{$dato.valor|default:""}">
          </div>
          <div class="form-group">
            <label>Estado</label>
            <select name="activo" class="form-control">
              <option value="{$dato.activo}">{if $dato.activo==1}Si{else}No{/if}</option>
              <option value="1">Activar</option>
              <option value="2">Desactivar</option>
            </select>
          </div>
          <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" rows="5" style="resize: none;">{$dato.descripcion|default:""}</textarea>
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}cursos/view/{$dato.id}" class="btn btn-link">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


	
	
	
