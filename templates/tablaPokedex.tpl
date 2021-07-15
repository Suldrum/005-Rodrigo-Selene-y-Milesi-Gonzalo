{include 'templates/header.tpl'}
{include 'templates/filtro.tpl'}
<div class="m-0 row justify-content-center">
    <div class=" col-auto m-2 text-center" style="height: 540px; overflow: scroll;">
        <table class="table  table-dark">
            <thead>
                <tr class="align-middle">
                    <th style=" position: sticky; top: 0; z-index: 1; ">#</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">Imagen</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">Nombre</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">Ver detalle</th>
                    {if ($userLogged['admin'])}
                        <th style=" position: sticky; top: 0; z-index: 1; ">Editar</th>
                        <th style=" position: sticky; top: 0; z-index: 1; ">Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody>
                {foreach from=$listaPokemons item=pokemon}
                    <tr class="align-middle">
                        <td>{$pokemon->id_pokemon}</td>
                        <td><img class="img-fluid" height="150px" width="150px" src="{$pokemon->imagen_pokemon}"></td>
                        <td>{$pokemon->nombre}</td>
                        <td> <a href="verTarjetaPokemon/{$pokemon->id_pokemon}">+</a> </td>
                        {if ($userLogged['admin'])}
                            <td>
                                <button id="botonActualizarTipo"
                                    onclick="location.href='editarPokemon/{$pokemon->id_pokemon}'">Editar</button>
                            </td>
                            <td>
                                <button id="botonEliminarTipo"
                                    onclick="location.href='eliminarPokemon/{$pokemon->id_pokemon}'">BORRAR</button>
                            </td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
       
    </div>
    {if ($userLogged['admin'])}
        <button class="btn btn-outline-success" onclick="location.href='crearPokemon'">Crear Pokemon</button></td>
    {/if}
</div>
{include 'templates/footer.tpl'}