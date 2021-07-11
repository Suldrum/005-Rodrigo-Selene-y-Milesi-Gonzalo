'use strict';

//ELIMINAR LOS ALERTS / MOVERLOS AL CONTROLADRO

/**
 *  Obtener el id del pokemon desde un atributo HTML.
 */
 function getPokemonID() {
    let urlParts = window.location.href.split('/');
    return parseInt(urlParts[urlParts.length - 1]);
}

let listaComentarios = new Vue({
    //nombre del div donde se carga
    el: '#comments', 
    data: {
        error: false,
        //lo pone en true ya que los metodos se encargaran de ponerlo en false cuando terminen
        loading: true,
        notComment: false, 
    //    privilege: privilege,
    //arreglo de recepcion de la informacion
        pokemonComments: []
    },
    methods: {
        /**
         * Funcion de eliminar del boton en el template
         */
         eliminarComentario: function (commentID) {
            deletePokemonComment(commentID); // CONTROLES EN EL CONTROLADOR Y EN EL VUE
            
        }
    }
});

// ESTO DEBE EDITARSE DE MANERA QUE SOLO SE ENVIE EL TEXTO Y LA CALIFICACION, EL RESTO SE VERIFICA EN EL CONTROLADOR
let nuevoComentario = new Vue({
    //nombre del div donde se carga
    el:'#newComment',
    data: {
        userComment: null,
    },
    methods: 
    {
        // Responde al botón en el formulario de Vue
        guardarComentario: function(e) {
            // Previene la recarga automática de la página
            e.preventDefault(e);
            // Prepara un JSON con los datos del comentario y del autor
            let comment = {
                pokemon: getPokemonID(), 
                calificacion: document.querySelector('input[name="rating"]:checked').value, //Controlar que si no hay estrellas (osea valor null) corte
                texto: userComment.value
            }
            // Envía el JSON al método para postear el comentario
            newPokemonComment(comment);
            //document.querySelector('input[name="rating"]:checked').value
            // Limpia los campos en la pagina
            //userComment = null;
        //    formPostComment.rating = null;

        },
    },
});

function getStarValue()
{
    return document.querySelector('input[name="rating"]:checked').value;
}

// Pide cargar los comentarios ni bien se carga la página
$(document).ready(function (){
    getPokemonComments();
});

// Trae los comentarios de la API
function getPokemonComments() {
    //Inicio de mi lista de comentarios
    listaComentarios.error = false;
    listaComentarios.loading = true;
    listaComentarios.notComment=false;
    listaComentarios.pokemonComments = [];
    //Obtengo de que pokemon se cargan los comentarios
    let pokemonID = getPokemonID();
    fetch('api/comments/'+pokemonID)
    .then( response =>{ 
        if (response.status == 200)
        {
            return response.json();
            
        }else{
            return null;
        }
    })
    .then (pokemonComments => {
        if (pokemonComments == null)
        {
            listaComentarios.error = true;
        }
        else{
            if (pokemonComments == "Sin comentarios") {
            // Hubo un error
            listaComentarios.notComment=true;
            }
            else {
                // Obtengo todos los comentarios de un pokemon y lo guardo en la lista de comentarios
                listaComentarios.pokemonComments = pokemonComments;
       //     averageRating.users_rating = getAverage(ins_comments);
            }
        }
        // Termina la carga de informacion
        listaComentarios.loading = false;
       // averageRating.loading = false;
    })
    .catch(exception => console.log(exception));
}

// Permite postear un comentario con calificación
function newPokemonComment(comment) {

    fetch('api/comment', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        mode: 'cors',
        body: JSON.stringify(comment)
    })
    .then( response =>{ 
        if (response.status == 200)
        {
            getPokemonComments();
            alert('El comentario fue agregado');
            
        }else{
            alert('El comentario no pudo ser enviado');
        }
    })
    .catch(exception => console.log(exception));

}

// Borra un comentario en la Base de Datos y de la Pagina
function deletePokemonComment(commentID) {
    fetch('api/comment/'+commentID,{
        method: 'DELETE',
        mode: 'cors'
    }) 
    .then( response =>{ 
        if (response.status == 200)
        {
            getPokemonComments();
            alert('El comentario fue eliminado');
            
        }else{
            alert('El comentario no pudo ser eliminado');
        }
    })
    .catch(exception => console.log(exception));
}