<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Lista de Roles</h3>
		<table class="table table-hover">
			<th>
				Rol
			</th>
			
			{if isset($roles) && count($roles)}
				{foreach from=$roles item=r}
					<tr>
						<td>{$r.nombre}</td>
						<td>
							<a href="{$_layoutParams.root}roles/view/{$r.id}">Ver</a>&nbsp;&nbsp;
							<a href="{$_layoutParams.root}roles/edit/{$r.id}">Editar</a>
						</td>
					</tr>

				{/foreach}
			{else}
				<p class="text-info">No hay roles registrados</p>
			{/if}
			
		</table>
		<a href="{$_layoutParams.root}roles/add" class="btn btn-primary my-btn dark">Agregar Roles</a>
		<a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
	</div>
</div>
	


	
	
	
