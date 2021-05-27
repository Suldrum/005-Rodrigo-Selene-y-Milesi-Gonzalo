{include 'templates/header.tpl'}
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
                    <td><a href="verTarjetaPokemon/{$pokemon->id_pokemon}">+</a></td> 
                </tr>   
            {/foreach}
        </tbody>
    </table>
</div>
{include 'templates/footer.tpl'}