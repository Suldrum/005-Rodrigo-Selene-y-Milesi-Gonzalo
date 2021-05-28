<div class="container">
<!--  
<form method="POST" action="filtroAll">
-->
    <form method="POST" action="filtroRegion">
        <label for="region"> Region </label>
        <select name="F_id_region">
        {foreach from = $listaRegiones item = region}
            <option value="{$region->id_region}">{$region->nombre}</option>
        {/foreach}
        </select>
        
        <button id="botonFiltroRegion"> Filtrar Region</button>
    </form>


    <form method="POST" action="filtroTipo">
        <label for="tipo"> Tipo </label>
        <select name="F_id_tipo_elemental">
        {foreach from = $listaTipos item = tipo}
            <option value ="{$tipo->id_tipo_elemental}" > {$tipo->nombre}</option>
        {/foreach}
        </select>

        <button id="botonFiltroTipo">Filtrar Tipo</button>
    </form>
    
<br>
<br>
<!--    
<button id="botonFiltroAll">Filtrar Todo</button>

</form>
-->
</div>