{include 'templates/header.tpl'}
{include 'templates/filtro.tpl'}
{if ($listaPokemons == null)}
        <h1> ¡Vaya! No tenemos ningun pokemon asi, tendremos que salir a atraparlos a todos</h1>
{else}
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
                        <td><img  class="img-fluid" height="200px" width="200px" src="{$pokemon->imagen_pokemon}"></td>
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
</div>
    <!-- PAGINADO -->
    {include 'templates/pagination.tpl'}
    {if ($userLogged['admin'])}
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-outline-success" onclick="location.href='crearPokemon'">Crear Pokemon</button></td>
        </div>
    {/if}
{/if}
{include 'templates/footer.tpl'}