{include 'templates/header.tpl'}

<div class="container">
    <p>{$pokemon->nombre}</p>
    <img src="{$pokemon->imagen_pokemon}">
</div>

{include 'templates/footer.tpl'}