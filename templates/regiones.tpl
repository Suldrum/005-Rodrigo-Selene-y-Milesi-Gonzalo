{include 'templates/header.tpl'}
<div class="container">
    <table id="tablaRegiones" class="tableFixHead">
        <thead>
            <tr>
                <th>#</th>
                <th>Region</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$listaRegiones item=region}
                <tr>
                    <td>{$region->id_region}</td>
                    <td>{$region->nombre}</td>
                    <td><img src="{$region->imagen_region}"></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{include 'templates/footer.tpl'}