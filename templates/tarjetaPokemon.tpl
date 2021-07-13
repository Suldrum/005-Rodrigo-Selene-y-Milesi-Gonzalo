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
    <a class='navegacion' href="dexter">Volver</a>
    <!---- CAMBIAR TODO LO POSIBLE A PHP ------>
    <section id = seccionComentario visible= {$userLogged['admin']}>
    {if isset($userLogged) && $userLogged}
        <!---- LA CONSOLA TIRA UN ERROR ACA PORQUE EL JS NO ENCUENTRA EL NEWCOMMENT ------>
        {include 'templates/vue/formComment.vue'}
    {/if}
        {include 'templates/vue/comments.vue'}
    </section>
   <script src="js/comments.js"></script> 
</div>
{include 'templates/footer.tpl'}