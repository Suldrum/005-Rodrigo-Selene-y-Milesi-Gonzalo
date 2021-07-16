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
                        <td><img src="{$pokemon->imagen_pokemon}"></td>
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

    <ul class="pagination">
    
    {if ($url[2] != "dexter")}
        {for $pagina = 1 to $cantPaginas}
            <li class="page-item"><a class="page-link" href="{$url[2]}/{$pagina}?{$url[4]}">{$pagina}</a></li>
        {/for}
    {else}
        {for $pagina = 1 to $cantPaginas}
            <li class="page-item"><a class="page-link" href="{$url[2]}/{$pagina}">{$pagina}</a></li>
        {/for}
    {/if}
    </ul>
    {if ($userLogged['admin'])}
        <button class="btn btn-outline-success" onclick="location.href='crearPokemon'">Crear Pokemon</button></td>
    {/if}
</div>
{include 'templates/footer.tpl'}