<div id="sites">
    <div class="col-md-8 col-md-offset-2">
        <h3>Cursos</h3>
        {if isset($cursos) && count($cursos)}
        <table class="table table-hover table-responsive">
            <tr>
                <th>Nombre del Curso</th>
                <th>Especialidad</th>
                <th>Docente a cargo</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Activo?</th>
                <th></th>
                {foreach from=$cursos item=c}
                    <tr>
                        <td><a href="{$_layoutParams.root}cursos/view/{$c.id}">{ucwords($c.nombre)}</a></td>
                        <td>{ucwords($c.especialidad)}</td>
                        <td>{ucwords($c.docente)}</td>
                        <td>{$c.fecha_inicio|date_format:'%d-%m-%Y'}</td>
                        <td>{$c.fecha_fin|date_format:'%d-%m-%Y'}</td>
                        <td>{if $c.activo==1}Si{else}No{/if}</td>
                    </tr>
                {/foreach}
            </tr>
        </table>
        {else}
            <p class="text-info">No hay cursos disponibles</p>
        {/if}
        <a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
    </div>
</div>