{include 'templates/header.tpl'}

<div class="container">
    <p>{$tarjetaPokemon->nombre}</p>
    <img class="img-fluid" height="200px" width="200px" src="{$tarjetaPokemon->imagen_pokemon}">
    <p>{$regionPokemon->nombre}</p>
    <img class="img-fluid" height="100px" width="100px" src="{$regionPokemon->imagen_region}">
    <img class="img-fluid" height="100px" width="100px" src="{$tipoElemental1->imagen_tipo}">
    {if {$tipoElemental2}!=NULL}
            <img class="img-fluid" height="100px" width="100px" src="{$tipoElemental2}">
    {/if}
    <a class='navegacion' href="dexter/1">Volver</a>
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