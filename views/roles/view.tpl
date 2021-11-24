<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Ver Rol</h3>
		<table class="table table-hover">
			<tr>
				<th>Nombre:</th>
				<td>{$role.nombre}</td>
			</tr>
		</table>
		<p>
			<a href="{$_layoutParams.root}roles/edit/{$role.id}" class="btn btn-link">Editar</a>
			<a href="{$_layoutParams.root}roles/delete/{$role.id}" class="btn btn-link" onclick="return eliminar('{$_layoutParams.root}roles/delete/{$role.id}', '{$role.nombre}')">Eliminar</a>
			<a href="{$_layoutParams.root}roles" class="btn btn-link">Volver</a>
		</p>
		<h3>Usuarios Asociados</h3>
		<ul class="nav flex-column">
			{if isset($usuarios) && count($usuarios)}
				{foreach from=$usuarios item=u}
					<li value="class="nav-item"">
						<a class="nav-link" href="{$_layoutParams.root}usuarios/view/{$u.id}">{$u.nombre}</a>
					</li>
				{/foreach}
			{else}
				<p class="text-info">No hay usuarios asociados a {$role.nombre}</p>
			{/if}
			<a href="{$_layoutParams.root}usuarios/add/{$role.id}" class="btn btn-primary my-btn dark">Agregar Usuario</a>
		</ul>
	</div>
</div>
	
	


	
	
	
