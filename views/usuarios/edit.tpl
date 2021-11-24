<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Editar Usuario</h3>
      <p>Llena los campos del formulario para editar usuario.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
  	   		<div class="form-group">
            <label>Nombre<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Nombre completo del usuario" name="nombre" value="{$dato.nombre|default:""}">
          </div>
          <div class="form-group">
            <label>Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" placeholder="Correo electrónico del usuario" name="email" value="{$dato.email|default:""}">
          </div>
          <div class="form-group">
            <label>Teléfono</label>
            <input type="tel" name="telefono" class="form-control" placeholder="Teléfono" value="{$dato.telefono}">
          </div>
          <div class="form-group">
            <label>Dirección</label>
            <input type="tel" name="direccion" class="form-control" placeholder="Dirección" value="{$dato.direccion}">
          </div>
          <div class="form-group">
            <label>Ciudad o Comuna</label>
            <select name="ciudad" class="form-control">
              <option value="{$dato.ciudad_id}">{if $dato.ciudad==''}No registrada{else}{$dato.ciudad}{/if}</option>
              {if isset($ciudades) && count($ciudades)}
                {foreach from=$ciudades item=ci}
                  <option value="{$ci.id}">{$ci.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
            <label>Rol:<span class="text-danger">*</span></label>
            <select name="role" class="form-control">
              <option value="{$dato.role_id}">{$dato.role}</option>
              {if isset($roles) && count($roles)}
                {foreach from=$roles item=rol}
                  <option value="{$rol.id}">{$rol.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
            <label>Activo<span class="text-danger">*</span></label>
            <select name="activo" class="form-control">
              <option value="{$dato.activo}">{if $dato.activo==1}Si{else}No{/if}</option>
              <option value="1">Activar</option>
              <option value="2">Desactivar</option>
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}usuarios/view/{$dato.id}" class="btn btn-link">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


	
	
	
