{include 'templates/header.tpl'}

<div class="container">
    <p>{$tarjetaPokemon->nombre}</p>
    <img src="{$tarjetaPokemon->imagen_pokemon}">
    <p>{$regionPokemon->nombre}</p>
    <img src="{$regionPokemon->imagen_region}">
    <img src="{$tipoElemental1->imagen_tipo}">
    {if {$tipoElemental2}!=NULL}
            <img src="{$tipoElemental2}">
    {/if}
</div>

{include 'templates/footer.tpl'}