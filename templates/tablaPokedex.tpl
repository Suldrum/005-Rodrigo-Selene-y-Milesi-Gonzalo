{include 'templates/header.tpl'}
{include 'templates/filtro.tpl'}
<div class="container">

    <table id="tablaPokedex" class="table table-dark table-sm">
        <thead>
            <tr class="align-middle">
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Ver detalle</th>
                {if ($userLogged['admin'])}
                    <th>Editar</th>
                    <th>Borrar</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$listaPokemons item=pokemon}
                <tr class="align-middle">
                    <td>{$pokemon->id_pokemon}</td>
                    <td><img src="{$pokemon->imagen_pokemon}"></td>
                    <td>{$pokemon->nombre}</td>
                    <td>  <a href="verTarjetaPokemon/{$pokemon->id_pokemon}">+</a>  </td>
                    {if ($userLogged['admin'])}
                        <td>   
                        <button id="botonActualizarTipo" onclick="location.href='editarPokemon/{$pokemon->id_pokemon}'" >Editar</button>
                        </td>
                        <td>    
                        <button id="botonEliminarTipo" onclick="location.href='eliminarPokemon/{$pokemon->id_pokemon}'" >BORRAR</button>
                        </td>
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
    {if ($userLogged['admin'])}
        <button class="btn btn-outline-success" onclick="location.href='crearPokemon'" >Crear Pokemon</button></td>
    {/if}
</div>
{include 'templates/footer.tpl'}