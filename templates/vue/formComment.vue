{literal}
<section id="newComment">
    <h3> ¿Quieres compartir lo que piensas de este pokemon? </h3>
    <!-- > AQUI PONER ESTRELLITAS <--->
    <textarea v-model="userComment" id="userComment" rows="8" cols="40"> Comentario...</textarea>
    <button v-on:click="guardarComentario">Postear</button>
</section>
{/literal}