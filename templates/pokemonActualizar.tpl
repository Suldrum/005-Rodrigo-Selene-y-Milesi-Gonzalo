{include 'templates/header.tpl'}
<div class="container">
    <div id= "datosRegionActual">
        <img class="img-fluid" height="100px" width="100px" alt= "IMAGEN_REGION_ACTUAL"src="{$pokemonActual->imagen_region}">
    {$pokemonActual->nombre}
        <img class="img-fluid" height="150px" width="150px" alt= "IMAGEN_POKEMON_ACTUAL"src="{$pokemonActual->imagen_pokemon}">
        <img class="img-fluid" height="100px" width="100px" alt= "IMAGEN_TIPO1_ACTUAL"src="{$pokemonActual->imagen_tipo1}"> 
        {if {$pokemonActual->imagen_tipo2}!=NULL}  
            <img class="img-fluid" height="100px" width="100px" alt= "IMAGEN_TIPO2_ACTUAL"src="{$pokemonActual->imagen_tipo2}">
        {/if}   
    </div>
    <br>
    <br>
    <div id= "datosPokemonNuevos">
    <form action="editPokemon/{$pokemonActual->id_pokemon}" method="POST" enctype="multipart/form-data">
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