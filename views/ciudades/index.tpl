<div id="sites">
    <div class="col-md-6 col-md-offset-2">
        <h3>Ciudades o Comunas</h3>
        {if isset($ciudades) && count($ciudades)}
            <table class="table table-hover">
                <tr>
                    <th>Nombre</th>
                    <th>Región</th>
                    <th></th>
                </tr>
                {foreach from=$ciudades item=c}
                    <tr>
                        <td>{$c.nombre}</td>
                        <td>{$c.region}</td>
                        <td>
                            <a href="{$_layoutParams.root}ciudades/view/{$c.id}">Ver</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
        {else}
            <p class="text-info">No hay ciudades registradas</p>
        {/if}
        <a href="{$_layoutParams.root}admin" class="btn btn-link">Administración</a>
    </div>
</div>