<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Editar Ciudad o Comuna</h3>
      <p>Llena los campos del formulario para editar ciudad o comuna.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
  	   		<div class="form-group">
            <label>Ciudad o Comuna<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Nombre de la ciudad o comuna" name="nombre" value="{$dato.nombre|default:""}">
          </div>
          <div class="form-group">
            <label>Región</label>
            <select name="region" class="form-control">
              <option value="{$dato.region_id}">{$dato.region}</option>
              {if isset($regiones) && count($regiones)}
                {foreach from=$regiones item=r}
                  <option value="{$r.id}">{$r.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}ciudades/view/{$dato.id}" class="btn btn-link">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


	
	
	
