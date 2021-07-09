{literal}
<section id="comments">
<h3> COMENTARIOS</h3>

    <div v-if="error">
        <p>Lo sentimos, no es posible obtener la información en este momento, por favor intente nuevamente mas tarde</p>    
    </div>

    <div v-if="loading">Cargando...</div>

    <div v-if="!loading">
        CARGA DE COMENTARIOS 
         
    <!--- >    <h3> Calificacion: {{finalScore}} </h3>  <--->
        <div v-for="comentario in pokemonComments" style="width: 18rem;">
            <div>
                <h5>{{comentario.id_fk_usuario}}</h5>
                <h6>Puntuacion: {{comentario.calificacion}}</h6>
                <p>{{comentario.texto}}</p>
                <button v-if="administrador" v-on:click="eliminarComentario(comentario.id_comentario)">Eliminar</button>    
            </div>
        </div>
    
    </div>
</section>
{/literal}