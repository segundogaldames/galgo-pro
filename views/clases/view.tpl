<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Ver Clase</h3>
		<table class="table table-hover">
			<tr>
				<th>Título:</th>
				<td>{ucwords($clase.titulo)}</td>
			</tr>
			<tr>
				<th>Curso:</th>
				<td>{ucwords($clase.curso)}</td>
			</tr>
			<tr>
				<th>Fecha Creación:</th>
				<td>{$clase.creado|date_format:'%d-%m-%Y %H:%M'}</td>
			</tr>
			<tr>
				<th>Descripción:</th>
				<td>{ucfirst($clase.descripcion)}</td>
			</tr>
		</table>
		<p>
			<a href="{$_layoutParams.root}clases/edit/{$clase.id}" class="btn btn-link">Editar</a>
			<a href="{$_layoutParams.root}clases" class="btn btn-link">Clases</a>
			<a href="{$_layoutParams.root}cursos" class="btn btn-link">Cursos</a>
			<a href="{$_layoutParams.root}especialidades" class="btn btn-link">Especialidades</a>
		</p>
		<hr>
		<h3>Recursos Relacionados</h3>
		<hr>
		<h3>Actividades Relacionadas</h3>
	</div>
</div>
	
	


	
	
	
