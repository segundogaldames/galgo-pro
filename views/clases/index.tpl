<div id="sites">
    <div class="col-md-8 col-md-offset-2">
        <h3>Clases</h3>
        {if isset($clases) && count($clases)}
        <table class="table table-hover table-responsive">
            <tr>
                <th>Titulo</th>
                <th>Curso</th>
                <th>Fecha Creación</th>
                <th></th>
                {foreach from=$clases item=cl}
                    <tr>
                        <td><a href="{$_layoutParams.root}clases/view/{$cl.id}" title="Ver Clase">{ucwords($cl.titulo)}</a></td>
                        <td>{ucwords($cl.curso)}</td>
                        <td>{$cl.creado|date_format:"%d-%m-%Y %H:%M"}</td>
                    </tr>
                {/foreach}
            </tr>
        </table>
        {else}
            <p class="text-info">No hay clases disponibles</p>
        {/if}
        <a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
    </div>
</div>