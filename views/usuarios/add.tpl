<div id="tf-contact">
  <div class="container">
    <div class="section-title">
      <h3>Nuevo Usuario</h3>
      <p>Llena los campos del formulario para registrar usuario.</p>
      <p class="text-danger">* Campos obligatorios</p>
      <hr>
    </div>

    <div class="space"></div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form id="contact" action="" method="post">
  	   		<div class="form-group">
            <label>Nombre<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Nombre completo del usuario" name="nombre" value="{$datos.nombre|default:""}">
          </div>
          <div class="form-group">
            <label>Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Correo electrónico del usuario" name="email" value="{$datos.email|default:""}">
          </div>
          <div class="form-group">
            <label>Teléfono (fijo o celular)</label>
            <input type="tel" name="telefono" class="form-control" placeholder="Mínimo 9 digitos" value="{$datos.telefono|default:""}">
          </div>
          <div class="form-group">
            <label>Dirección (opcional)</label>
            <textarea name="direccion" class="form-control" style="resize: none;" placeholder="Dirección del usuario">{$datos.direccion|default:""}</textarea>
          </div>
          <div class="form-group">
            <label>Ciudad (opcional)</label>
            <select name="ciudad" class="form-control">
              <option value="">Seleccione...</option>
              {if isset($ciudades) && count($ciudades)}
                {foreach from=$ciudades item=ci}
                  <option value="{$ci.id}">{$ci.nombre}</option>
                {/foreach}
              {/if}
            </select>
          </div>
          <div class="form-group">
           	<label>Password (8 caracteres como mínimo) <span class="text-danger">*</span></label>
          	<input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
           	<label>Re ingrese Password <span class="text-danger">*</span></label>
            <input type="password" name="repassword" class="form-control">
          </div>
          <div class="form-group">
            <input type="hidden" name="enviar" value="{$enviar}">
            <input type="submit" value="Enviar" class="btn btn-success my-btn dark">
            <a href="{$_layoutParams.root}usuarios" class="btn btn-link">Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


	
	
	
