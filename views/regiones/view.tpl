<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Ver Región</h3>
		<table class="table table-hover">
			<tr>
				<th>Región:</th>
				<td>{$region.nombre}</td>
			</tr>
		</table>
		<p>
			<a href="{$_layoutParams.root}regiones/edit/{$region.id}" class="btn btn-link">Editar</a>
			<a href="{$_layoutParams.root}regiones" class="btn btn-link">Volver</a>
		</p>
		<hr>
		<h3>Ciudades o Comunas Asociadas</h3>
		{if isset($ciudades) && count($ciudades)}
			<ul class="nav flex-column">
				{foreach from=$ciudades item=ci}
					<li class="nav-item">
		                <a class="nav-link" href="{$_layoutParams.root}ciudades/view/{$ci.id}">{$ci.nombre}</a>
		            </li>
				{/foreach}
        	</ul>
        {else}
        	<p class="text-info">No hay ciudades asociadas a la Región {$region.nombre}</p>	
		{/if}
		<a href="{$_layoutParams.root}ciudades/add/{$region.id}" class="btn btn-primary my-btn dark">Agregar Ciudad o Comuna</a>
	</div>
</div>
	
	


	
	
	
