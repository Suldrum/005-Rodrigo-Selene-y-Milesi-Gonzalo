{include 'templates/header.tpl'}

<div class="container">
    <table id="tablaTipoElemental" class="tableFixHead">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$listaTipoElemental item=tipo}
                <tr>
                    <td>{$tipo->id_tipo_elemental}</td>
                    <td>{$tipo->nombre}</td>
                    <td><img src="{$tipo->imagen_tipo}"></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>

{include 'templates/footer.tpl'}