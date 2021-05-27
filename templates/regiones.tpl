{include 'templates/header.tpl'}
<div class="container">
    <table id="tablaRegiones" class="tableFixHead">
        <thead>
            <tr>
                <th>#</th>
                <th>Region</th>
                <th>Imagen</th>
                {if ($userLogged['admin'])}
                    <th>ACCIONES</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$listaRegiones item=region}
                <tr>
                    <td>{$region->id_region}</td>
                    <td>{$region->nombre}</td>
                    <td><img src="{$region->imagen_region}"></td>
                     <!--SI ES ADMINISTRADOR / ESTO ES PARA PROBAR -->    
                     {if ($userLogged['admin'])}
                        <td>   <button id="botonCrearCuenta" onclick="location.href='editarRegion/{$region->id_region}'" >Editar</button>
                        <button id="botonCrearCuenta" onclick="location.href='eliminarRegion/{$region->id_region}'" >BORRAR</button></td>
                    {/if}
                </tr>
            {/foreach}
        </tbody>
        {if ($userLogged['admin'])}
            <button id="botonCrearRegion" onclick="location.href='crearRegion'" >Crear Nueva Region</button></td>
        {/if}
    </table>
</div>
{include 'templates/footer.tpl'}