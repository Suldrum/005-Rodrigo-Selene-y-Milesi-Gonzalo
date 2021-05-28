{include 'templates/header.tpl'}
<div class="container">
    <div id= "datosRegionActual">
        {$pokemonActual->id_pokemon}
        {$pokemonActual->id_region}
        {$pokemonActual->nombre}
        <img alt= "IMAGEN_POKEMON_ACTUAL"src="{$pokemonActual->nombre}">
        <img alt= "IMAGEN_TIPO1_ACTUAL"src="{$pokemonActual->id_tipo_elemental}">
        <img alt= "IMAGEN_TIPO2_ACTUAL"src="{$pokemonActual->id_tipo_elemental2}">
    </div>
    <br>
    <br>
    <div id= "datosPokemonNuevos">
    <form action="editPokemon/{$pokemonActual->id_pokemon}" method="POST">
    <!--
    <label for="numero_pokedex">Numero de Pokedex Nacional: </label>
    <input type="text" name="F_id_pokemon" placeholder="" />
   -->
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
    
    <button id="botonCrear">Editar Pokemon</button>
</form>
</div>
{include 'templates/footer.tpl'}