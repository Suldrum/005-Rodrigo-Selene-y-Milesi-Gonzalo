{include 'templates/header.tpl'}
<div class="container">
    <div id= "datosRegionActual">
        {$pokemonActual->id_pokemon}
        {$regionPokemon = {$pokemonActual->id_region} - 1}
        <img alt= "IMAGEN_REGION_ACTUAL"src="{$listaRegiones[$regionPokemon]->imagen_region}">
        {$pokemonActual->nombre}
        {$tipo1 = {$pokemonActual->id_tipo_elemental} - 1} 
        <img alt= "IMAGEN_POKEMON_ACTUAL"src="{$pokemonActual->imagen_pokemon}">
        <img alt= "IMAGEN_TIPO1_ACTUAL"src="{$listaTipos[$tipo1]->imagen_tipo}"> 
        {if {$pokemonActual->id_tipo_elemental2}!=NULL}  
            {$tipo2 = {$pokemonActual->id_tipo_elemental2} - 1}  
            <img alt= "IMAGEN_TIPO2_ACTUAL"src="{$listaTipos[$tipo2]->imagen_tipo}">
        {/if}   
    </div>
    <br>
    <br>
    <div id= "datosPokemonNuevos">
    <form action="editPokemon/{$pokemonActual->id_pokemon}" method="POST">
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
    <option value="NADA"> NINGUNO</option>
    {foreach from = $listaTipos item = tipo}
        <option value="{$tipo->id_tipo_elemental}"> {$tipo->nombre}</option>
    {/foreach}
    </select>
    
    <button class="btn btn-outline-success">Editar Pokemon</button>
</form>
</div>
{include 'templates/footer.tpl'}