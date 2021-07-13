{literal}
<section id="comments">
<h3> COMENTARIOS</h3>

    <div v-if="error">
        <p>Lo sentimos, no es posible obtener la información en este momento, por favor intente nuevamente mas tarde</p>    
    </div>

<div v-if="notComment">
        <p> :( </p>    
    </div>
    <div v-if="loading">Cargando...</div>

    <div v-if="!loading">
        CARGA DE COMENTARIOS 
         
        <div v-for="comentario in pokemonComments" style="width: 18rem;">
            <div>
                <h5>{{comentario.id_fk_usuario}}</h5>
                <h6>Puntuacion: {{comentario.calificacion}} </h6>   
                <div class="star-rating" >
                <div class="star-rating__wrap" :disabled="true" id="userComment" valueComment = comentario.calificacion>
                    <input class="star-rating__input" id="star-rating-5" type="radio" name="ratingCommet" value="5"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars" ></label>

                    <input class="star-rating__input" id="star-rating-4" type="radio"  name="ratingCommet" value="4"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>

                    <input class="star-rating__input" id="star-rating-3" type="radio" name="ratingCommet" value="3"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>

                    <input class="star-rating__input" id="star-rating-2" type="radio" name="ratingCommet" value="2"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
                    
                    <input class="star-rating__input" id="star-rating-1" type="radio" name="ratingCommet" value="1"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 out of 5 stars" ></label>
                </div>
                </div>
              
            <p>{{comentario.texto}}</p>
            <button v-on:click="eliminarComentario(comentario.id_comentario)" v-show="visible" >Eliminar</button>    
            </div>
        </div>
    </div>
</section>
{/literal}