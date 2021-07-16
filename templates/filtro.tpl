<div class="container">

<form method="POST" action="filtro/1">
        <label for="region"> Region </label>
        <select name="F_id_region">
        <option value="NADA">---</option>
        {foreach from = $listaRegiones item = region}
            <option value="{$region->id_region}">{$region->nombre}</option>
        {/foreach}
        </select>

        <label for="tipo"> Tipo </label>
        <select name="F_id_tipo_elemental">
        <option value="NADA">---</option>
        {foreach from = $listaTipos item = tipo}
            <option value ="{$tipo->id_tipo_elemental}" > {$tipo->nombre}</option>
        {/foreach}
        </select>
    
<br>
<br>
 
<button id="botonFiltro"> Filtrar</button>

</form>

</div>