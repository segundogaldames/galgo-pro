<div id="sites">
        
    <div class="col-md-4 col-md-offset-3">
        {if isset($asuntos) && count($asuntos)}
            <h3>Asuntos</h3>
            <table class="table table-hover">
                <tr>
                    <th>Asunto</th>
                    <th></th>
                </tr>
                {foreach from=$asuntos item=as}
                    <tr>
                        <td>{$as.nombre}</td>
                        <td>
                            <a href="{$_layoutParams.root}asuntos/view/{$as.id}">Ver</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
        {else}
            <p class="text-info">No hay asuntos disponibles</p>
            
        {/if}
        <a href="{$_layoutParams.root}asuntos/add" class="btn btn-primary my-btn dark">Agregar Asunto</a>
        <a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
    </div>
   
</div>