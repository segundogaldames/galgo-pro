<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Editar Clase</h3>
      <p>Llena los campos del formulario para modificar clase.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
  	   		<div class="form-group">
            <label>Titulo<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Titulo de la clase" name="titulo" value="{$dato.titulo|default:""}">
          </div>
          <div class="form-group">
            <label>Curso<span class="text-danger">*</span></label>
            <select name="curso" class="form-control">
              <option value="{$dato.curso_id}">{$dato.curso}</option>
              {if isset($cursos) && count($cursos)}
                {foreach from=$cursos item=cu}
                  <option value="{$cu.id}">{$cu.nombre}</option>
                {/foreach}
              {/if}
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


	
	
	
