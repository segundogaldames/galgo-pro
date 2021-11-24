<div id="sites">
	<div class="col-md-8 col-md-offset-2">
		{if isset($usuarios) && count($usuarios)}
			<h3>Lista de Usuarios</h3>
			<table class="table table-hover">
				<th>
					Nombre
				</th>
				<th>
					Email
				</th>
				<th>
					Rol
				</th>
				<th>
					Activo
				</th>
				<th></th>
				
					{foreach from=$usuarios item=u}
						<tr>
							<td>{ucfirst($u.nombre)}</td>
							<td>{$u.email}</td>
							<td>{$u.role}</td>
							<td>{if $u.activo==1}Si{else}No{/if}</td>
							<td>
								<a href="{$_layoutParams.root}usuarios/view/{$u.id}">Ver</a>&nbsp;&nbsp;
								<a href="{$_layoutParams.root}usuarios/edit/{$u.id}">Editar</a>
							</td>
						</tr>

					{/foreach}
			{else}
				<p class="text-info"><strong>No hay usuarios registrados</strong></p>
			{/if}
			
		</table>
		<a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
	</div>
</div>

	


	
	
	
