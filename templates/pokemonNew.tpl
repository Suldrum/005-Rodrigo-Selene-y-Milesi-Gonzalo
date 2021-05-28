{include 'templates/header.tpl'}
<div class="container">
    <form action="createPokemon" method="POST">
        <label for="numero_pokedex">Numero de Pokedex Nacional: </label>
        <input type="text" name="F_id_pokemon" placeholder="" />
       
        <select name="F_id_region">
        <label for="region"> Region </label>
        {foreach from = $listaRegiones item = region}
            <option value="{$region->id_region}">{$region->nombre}</option>
        {/foreach}
        </select>
        
        <label for="nombre"> Nombre </label>
        <input type="text" name="F_nombre" placeholder="" />
        
        <label for="imagen"> Link de la imagen </label>
        <input type="text" name="F_imagen" placeholder="" />
        
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
        <input type="checkbox" id="chequeo">
        <button id="botonCrear">Crear Pokemon</button>
    </form>
</div>
{include 'templates/footer.tpl'}