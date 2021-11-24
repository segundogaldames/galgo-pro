<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Ver Asunto</h3>
		<table class="table table-hover">
			<tr>
				<th>Nombre:</th>
				<td>{$asunto.nombre}</td>
			</tr>
		</table>
		<p>
			<a href="{$_layoutParams.root}asuntos/edit/{$asunto.id}" class="btn btn-link">Editar</a>
			<a href="{$_layoutParams.root}asuntos" class="btn btn-link">Volver</a>
		</p>
		<hr>
		<h3>Contactos Asociados</h3>
		{if isset($contactos) && count($contactos)}
			<table class="table table-hover">
				<tr>
					<th>Nombre Contacto</th>
					<th>Fecha Contacto</th>
					<th>Estado</th>
				</tr>
				{foreach from=$contactos item=c}
					<tr>
						<td>
							<a class="nav-link" href="{$_layoutParams.root}contactos/view/{$c.id}">{$c.nombre}</a>
						</td>
						<td>{$c.creado}</td>
						<td>{if $c.estado_id==1}Pendiente{else}Procesado{/if}</td>
					</tr>
				{/foreach}
			</table>	
				
			{else}
				<p class="text-info">No hay usuarios asociados a {$asunto.nombre}</p>
			{/if}
		</ul>
	</div>
</div>
	
	


	
	
	
