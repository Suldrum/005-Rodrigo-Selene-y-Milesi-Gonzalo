<div class="container">
    <label for="region"> Region </label>
    <select name="F_id_region">
    {foreach from = $listaRegiones item = region}
        <option value="{$region->id_region}">{$region->nombre}</option>
    {/foreach}
    </select>
    <button id="botonFiltroRegion" onsubmit="location.href='filtroRegion'"> Filtrar Region</button>

    <label for="tipo"> Tipo </label>
    <select name="F_id_tipo_elemental">
    {foreach from = $listaTipos item = tipo}
        <option value ="{$tipo->id_tipo_elemental}" > {$tipo->nombre}</option>
    {/foreach}
    </select>
    <button id="botonFiltroTipo" onclick="location.href='filtroTipo'">Filtrar Tipo</button>
<br>
<br>
    <button id="botonFiltroAll" onclick="location.href='filtroAll'">Filtrar Tipo</button>

</div>