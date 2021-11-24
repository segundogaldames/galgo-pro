<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Ver Usuario</h3>
		<table class="table table-hover">
			<tr>
				<th>Nombre:</th>
				<td>{$usuario.nombre}</td>
			</tr>
			<tr>
				<th>Email:</th>
				<td>{$usuario.email}</td>
			</tr>
			<tr>
				<th>Teléfono</th>
				<td>{$usuario.telefono}</td>
			</tr>
			<tr>
				<th>Dirección</th>
				<td>{if $usuario.direccion==''}No registrada{else}{$usuario.direccion}{/if}</td>
			</tr>
			<tr>
				<th>Ciudad</th>
				<td>{if $usuario.ciudad==''}No registrada{else}{$usuario.ciudad}{/if}</td>
			</tr>
			<tr>
				<th>Rol:</th>
				<td>{$usuario.role}</td>
			</tr>
			<tr>
				<th>Activo:</th>
				<td>{if $usuario.activo==1}Si{else}No{/if}</td>
			</tr>
		</table>
		<p>
			<a href="{$_layoutParams.root}usuarios/edit/{$usuario.id}" class="btn btn-link">Editar</a>
			<a href="{$_layoutParams.root}usuarios/{$usuario.id}" class="btn btn-link">Volver</a>
		</p>
	</div>
</div>

