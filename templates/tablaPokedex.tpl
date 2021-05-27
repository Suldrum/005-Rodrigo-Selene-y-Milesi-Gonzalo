{include 'templates/header.tpl'}
<div class="container">
    <table id="tablaPokedex" class="tableFixHead">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Region</th> <!-- ¿Necesario? ¿Filtrar por # dado que seria un Kanto = 1 a 151?-->
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$listaPokemons item=pokemon}
                <tr>
                    <td>{$pokemon->id_pokemon}</td>
                    <td><img src="{$pokemon->imagen_pokemon}"></td>
                    <td><img src="{$pokemon->id_region}"></td>
                    <td>{$pokemon->nombre}</td>
                    <td><img src="{$pokemon->id_tipo_elemental}"></td>
                    <td>{if isset({$pokemon->id_tipo_elemental2})}
                            <img src="{$pokemon->id_tipo_elemental2}">
                        {/if}
                    </td>
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