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
                    <!--SI ES ADMINISTRADOR / ESTO ES PARA PROBAR -->    
                    {if ($userLogged['admin'])}
                        <td>   
                        <button id="botonActualizarTipo" onclick="location.href='editarTipoElemental/{$tipo->id_tipo_elemental}'" >Editar</button>
                        <button id="botonEliminarTipo" onclick="location.href='eliminarTipoElemental/{$tipo->id_tipo_elemental}'" >BORRAR</button>
                        </td>
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
    {if ($userLogged['admin'])}
        <button id="botonCrearTipo" onclick="location.href='crearTipoElemental'" >Crear Nuevo Tipo</button></td>
    {/if}
</div>

{include 'templates/footer.tpl'}