{include 'templates/header.tpl'}
<div class="m-0 row justify-content-center">
    <div class= " col-auto m-2 text-center" style="height: 540px; widht: 100%; overflow: scroll;">
        <table id="tablaTipoElemental" class="table table-dark table-sm" style="width: 50%; ">
            <thead>
                <tr class="align-middle">
                    <th style=" position: sticky; top: 0; z-index: 1; background-color: darkblue; ">#</th>
                    <th style=" position: sticky; top: 0; z-index: 1; background-color: darkblue;">Tipo</th>
                    <th style=" position: sticky; top: 0; z-index: 1; background-color: darkblue; ">Imagen</th>
                    {if ($userLogged['admin'])}
                        <th style=" position: sticky; top: 0; z-index: 1; ">Editar</th>
                        <th style=" position: sticky; top: 0; z-index: 1; ">Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody>
                {foreach from=$listaTipoElemental item=tipo}
                    <tr class="align-middle">
                        <td style="background-color: aqua;">{$tipo->id_tipo_elemental}</td>
                        <td style="background-color: aqua;">{$tipo->nombre}</td>
                        <td style="background-color: aqua;"><img src="{$tipo->imagen_tipo}"></td>
                        <!--SI ES ADMINISTRADOR / ESTO ES PARA PROBAR -->
                        {if ($userLogged['admin'])}
                            <td>
                                <button id="botonActualizarTipo"
                                    onclick="location.href='editarTipoElemental/{$tipo->id_tipo_elemental}'">Editar</button>
                            </td>
                            <td>
                                <button id="botonEliminarTipo"
                                    onclick="location.href='eliminarTipoElemental/{$tipo->id_tipo_elemental}'">BORRAR</button>
                            </td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table> 
    </div>
    {if ($userLogged['admin'])}
        <button id="botonCrearTipo" onclick="location.href='crearTipoElemental'">Crear Nuevo Tipo</button></td>
    {/if}
</div>
{include 'templates/footer.tpl'}