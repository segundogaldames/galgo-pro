<div id="sites">
        
    <div class="col-md-4 col-md-offset-3">
        {if isset($regiones) && count($regiones)}
            <h3>Regiones</h3>
            <table class="table table-hover">
                <tr>
                    <th>Región</th>
                    <th></th>
                </tr>
                {foreach from=$regiones item=r}
                    <tr>
                        <td>{$r.nombre}</td>
                        <td>
                            <a href="{$_layoutParams.root}regiones/view/{$r.id}">Ver</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
        {else}
            <p class="text-info">No hay regiones disponibles</p>
            
        {/if}
        <a href="{$_layoutParams.root}regiones/add" class="btn btn-primary my-btn dark">Agregar Región</a>
        <a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
    </div>
   
</div>