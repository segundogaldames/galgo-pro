<div id="sites">
	<div class="col-md-6 col-md-offset-2">
		<h3>Ver Curso</h3>
		<table class="table table-hover">
			<tr>
				<th>Nombre:</th>
				<td>{ucwords($curso.nombre)}</td>
			</tr>
			<tr>
				<th>Especialidad:</th>
				<td>{ucwords($curso.especialidad)}</td>
			</tr>
			<tr>
				<th>Docente a Cargo:</th>
				<td>{ucwords($curso.docente)}</td>
			</tr>
			<tr>
				<th>Fecha de Inicio:</th>
				<td>{$curso.fecha_inicio|date_format:'%d-%m-%Y'}</td>
			</tr>
			<tr>
				<th>Fecha de Término:</th>
				<td>{$curso.fecha_fin|date_format:'%d-%m-%Y'}</td>
			</tr>
			<tr>
				<th>Precio:</th>
				<td>$ {$curso.valor}</td>
			</tr>
			<tr>
				<th>Activo:</th>
				<td>{if $curso.activo==1}Si{else}No{/if}</td>
			</tr>
			<tr>
				<th>Fecha de Creación:</th>
				<td>{$curso.creado|date_format:'%d-%m-%Y %H:%M'}</td>
			</tr>
			<tr>
				<th>Fecha de Modificación:</th>
				<td>{$curso.modificado|date_format:'%d-%m-%Y %H:%M'}</td>
			</tr>
			<tr>
				<th>Descripción:</th>
				<td>{ucfirst($curso.descripcion)}</td>
			</tr>
		</table>
		<p>
			<a href="{$_layoutParams.root}cursos/edit/{$curso.id}" class="btn btn-link">Editar</a>
			<a href="{$_layoutParams.root}cursos" class="btn btn-link">Cursos</a>
			<a href="{$_layoutParams.root}especialidades" class="btn btn-link">Especialidades</a>
		</p>
		<hr>
		<h3>Estudiantes Matriculados</h3>
		{if isset($estudiantes) && count($estudiantes)}
			<table class="table table-hover">
				<tr>
					<th>Nombre</th>
					<th>Fecha Matrícula</th>
					<th>Activo?</th>
					<th></th>
				</tr>
				{foreach from=$estudiantes item=est}
					<tr>
						<td><a href="{$_layoutParams.root}usuarios/view/{$est.estudiante_id}" title="Ver Estudiante">{$est.estudiante}</a></td>
						<td>{$est.fecha_matricula|date_format:"%d-%m-%Y %H:%M"}</td>
						<td>{if $est.activo==1}Si{else}No{/if}</td>
						<td><a href="{$_layoutParams.root}matriculas/edit/{$est.id}" title="Editar Matrícula">Editar Matrícula</a></td>
					</tr>
				{/foreach}
			</table>
		{else}
			<p class="text-info">No hay estudiantes matriculados en {$curso.nombre}</p>
		{/if}
		<a href="{$_layoutParams.root}matriculas/add/{$curso.id}" class="btn btn-primary my-btn dark">Matricular</a>
		<hr>
		<h3>Clases Asociadas</h3>
		{if isset($clases) && count($clases)}
			<table class="table table-hover">
				<tr>
					<th>Titulo</th>
					<th>Fecha Creación</th>
				</tr>
				{foreach from=$clases item=cl}
					<tr>
						<td><a href="{$_layoutParams.root}clases/view/{$cl.id}">{ucwords($cl.titulo)}</a></td>
						<td>{$cl.creado|date_format:"%d-%m-%Y %H:%M"}</td>
					</tr>
				{/foreach}
			</table>
		{else}
			<p class="text-info">No hay clases asociadas en {$curso.nombre}</p>
		{/if}
		<a href="{$_layoutParams.root}clases/add/{$curso.id}" class="btn btn-primary my-btn dark">Crear Clase</a>
	</div>
</div>
	
	


	
	
	
