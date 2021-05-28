{include 'templates/header.tpl'}
{include 'templates/filtro.tpl'}
<div class="container">

    <table id="tablaPokedex" class="tableFixHead">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Ver detalle</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$listaPokemons item=pokemon}
                <tr>
                    <td>{$pokemon->id_pokemon}</td>
                    <td><img src="{$pokemon->imagen_pokemon}"></td>
                    <td>{$pokemon->nombre}</td>
                    <td>  <a href="verTarjetaPokemon/{$pokemon->id_pokemon}">+</a>  </td>
                    {if ($userLogged['admin'])}
                        <td>   
                        <button id="botonActualizarTipo" onclick="location.href='editarPokemon/{$pokemon->id_pokemon}'" >Editar</button>
                        <button id="botonEliminarTipo" onclick="location.href='eliminarPokemon/{$pokemon->id_pokemon}'" >BORRAR</button>
                        </td>
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
    {if ($userLogged['admin'])}
        <button id="botonCrearPokemon" onclick="location.href='crearPokemon'" >Crear Pokemon</button></td>
    {/if}
</div>
{include 'templates/footer.tpl'}