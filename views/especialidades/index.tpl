<div id="sites">
    <div class="col-md-6 col-md-offset-3">
        {if isset($especialidades) && count($especialidades)}
            <h3>Especialidades</h3>
            <table class="table table-hover">
                <tr>
                    <th>Nombre</th>
                    <th></th>
                </tr>
                {foreach from=$especialidades item=esp}
                    <tr>
                        <td>{$esp.nombre}</td>
                        <td>
                            <a href="{$_layoutParams.root}especialidades/view/{$esp.id}">Ver</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
        {else}
            <p class="text-info">No hay especialidades disponibles</p>
            
        {/if}
        <a href="{$_layoutParams.root}especialidades/add" class="btn btn-primary my-btn dark">Agregar Especialidad</a>
        <a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
    </div>
   
</div>