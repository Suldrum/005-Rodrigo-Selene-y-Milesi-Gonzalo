{include 'templates/header.tpl'}
<div class="container">
    <table id="tablaPokedex">
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
                    <td><img src="{$pokemon->imagen_pokemon}"></img></td>
                    <td><img src="{$pokemon->id_region}"></img></td>
                    <td>{$pokemon->nombre}</td>
                    <td><img src="{$pokemon->id_tipo_elemental}"></img></td>
                    <td>{if isset({$pokemon->id_tipo_elemental2})}
                            <img src="{$pokemon->id_tipo_elemental2}"></img>
                        {/if}
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{include 'templates/footer.tpl'}