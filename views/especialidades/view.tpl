<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Ver Especialidad</h3>
		<table class="table table-hover">
			<tr>
				<th>Nombre:</th>
				<td>{$especialidad.nombre}</td>
			</tr>
		</table>
		<p>
			<a href="{$_layoutParams.root}especialidades/edit/{$especialidad.id}" class="btn btn-link">Editar</a>
			<a href="{$_layoutParams.root}especialidades" class="btn btn-link">Volver</a>
		</p>
		<hr>
		<h3>Cursos Asociados</h3>
		{if isset($cursos) && count($cursos)}
			<table class="table table-hover">
				<tr>
					<th>Nombre</th>
					<th>Fecha de Inicio</th>
					<th>Fecha de Término</th>
					<th>Activo?</th>
					{foreach from=$cursos item=c}
						<tr>
							<td><a href="{$_layoutParams.root}cursos/view/{$c.id}">{ucwords($c.nombre)}</a></td>
							<td>{$c.fecha_inicio|date_format:'%d-%m-%Y %H:%M'}</td>
							<td>{$c.fecha_fin|date_format:'%d-%m-%Y %H:%M'}</td>
							<td>{if $c.activo==1}Si{else}No{/if}</td>
						</tr>
					{/foreach}
				</tr>
			</table>
		{else}
			<p class="text-info">No hay cursos asociados a {$especialidad.nombre}</p>
		{/if}
		<a href="{$_layoutParams.root}cursos/add/{$especialidad.id}" class="btn btn-primary my-btn dark">Agregar Curso</a>
	</div>
</div>
	
	


	
	
	
