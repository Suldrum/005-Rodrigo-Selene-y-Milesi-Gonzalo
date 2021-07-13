{include 'templates/header.tpl'}
<div class="container">
    <form action="createPokemon" method="POST" enctype="multipart/form-data">
        <label for="numero_pokedex">Numero de Pokedex Nacional: </label>
        <input type="number" name="F_id_pokemon" placeholder="" min="1" max="9999" maxlength="4"/>
       
        <select name="F_id_region">
        <label for="region"> Region </label>
        {foreach from = $listaRegiones item = region}
            <option value="{$region->id_region}">{$region->nombre}</option>
        {/foreach}
        </select>
        
        {include 'templates/formNameImage.tpl'}
        
        <label for="tipo1"> Tipo Elemental </label>

        <select name="F_id_tipo_elemental">
        {foreach from = $listaTipos item = tipo}
            <option value="{$tipo->id_tipo_elemental}"> {$tipo->nombre}</option>
        {/foreach}
        </select>

        <label for="tipo2"> Tipo Elemental </label>
        <select id="selecTipo2" name="F_id_tipo_elemental2" >
        <option value="NADA">---</option>
        {foreach from = $listaTipos item = tipo}
            <option value="{$tipo->id_tipo_elemental}"> {$tipo->nombre}</option>
        {/foreach}
        </select>
        <button class="btn btn-outline-success">Crear Pokemon</button>
    </form>
</div>
{include 'templates/footer.tpl'}