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
    
    <label for="numero_pokedex">Numero de Pokedex Nacional: </label>
    <input type="text" name="F_id_pokemon" placeholder="" />
   
    <label for="region"> Region </label>
    <input type="text" name="F_region" placeholder="" />
    
    <label for="nombre"> Nombre </label>
    <input type="text" name="F_nombre" placeholder="" />
    
    <label for="imagen"> Link de la imagen </label>
    <input type="text" name="F_imagen" placeholder="" />
    
    <label for="tipo1"> Tipo Elemental </label>
    <input type="text" name="F_id_tipo_elemental" placeholder="" />
    
    <label for="tipo2"> Tipo Elemental </label>
    <input type="text" name="F_id_tipo_elemental2" placeholder="" />
    
    <button id="botonCrear">Editar Pokemon</button>
</form>
</div>
{include 'templates/footer.tpl'}