{include 'templates/header.tpl'}
<div class="m-0 row justify-content-center">
    <div class=" col-auto m-2 text-center" style="height: 540px; overflow: scroll;">
        <table class="table  table-dark">
            <thead>
                <tr class="align-middle">
                    <th style=" position: sticky; top: 0; z-index: 1; ">#</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">Region</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">Imagen</th>
                    {if ($userLogged['admin'])}
                        <th style=" position: sticky; top: 0; z-index: 1; ">Editar</th>
                        <th style=" position: sticky; top: 0; z-index: 1; ">Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody>
                {foreach from=$listaRegiones item=region}
                    <tr>
                        <td>{$region->id_region}</td>
                        <td>{$region->nombre}</td>
                        <td><img class="img-fluid" height="100px" width="100px" src="{$region->imagen_region}"></td>
                        <!--SI ES ADMINISTRADOR -->
                        {if ($userLogged['admin'])}
                            <td>
                                <button id="botonActualizarRegion" onclick="location.href='editarRegion/{$region->id_region}'">Editar</button>
                            </td>
                            <td>    
                                <button id="botonEliminarRegion" onclick="location.href='eliminarRegion/{$region->id_region}'">BORRAR</button>     
                            </td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
        
    </div>
    {if ($userLogged['admin'])}
        <button id="botonCrearRegion" onclick="location.href='crearRegion'">Crear Nueva Region</button></td>
    {/if}
</div>
{include 'templates/footer.tpl'}