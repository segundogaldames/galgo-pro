<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Ver Ciudad o Comuna</h3>
		<table class="table table-hover">
			<tr>
				<th>Ciudad o comuna:</th>
				<td>{$ciudad.nombre}</td>
			</tr>
			<tr>
				<th>Región:</th>
				<td>{$ciudad.region}</td>
			</tr>
		</table>
		<p>
			<a href="{$_layoutParams.root}ciudades/edit/{$ciudad.id}" class="btn btn-link">Editar</a>
			<a href="{$_layoutParams.root}ciudades" class="btn btn-link">Volver</a>
		</p>
	</div>
</div>
	
	


	
	
	
