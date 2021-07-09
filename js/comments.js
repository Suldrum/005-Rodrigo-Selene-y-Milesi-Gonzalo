'use strict';

// Se cargan los datos del usuario actual desde los elementos del HTML
//let username = document.querySelector('#seccionComentario').getAttribute('username');
//let userID = parseInt(document.querySelector('#seccionComentario').getAttribute('userID'));
//let privilege = document.querySelector('#seccionComentario').getAttribute('privilege');

// Pide cargar los comentarios ni bien se carga la página




/*
document.addEventListener('DOMContentLoaded', function(){
    getPokemonComments()
});
*/
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
            deletePokemonComment(commentID);
            
        }
    }
});

/*
let nuevoComentario = new Vue({
    //nombre del div donde se carga
    el:'#newComment',
    data: {
        userComment: null,
    //    rating: null,
        username: username,
   //     privilege: privilege
    },
    methods: { 
        // Responde al botón en el formulario de Vue
        guardarComentario: function(e) {
            // Previene la recarga automática de la página
            e.preventDefault(e);
            // Prepara un JSON con los datos del comentario y del autor
            let comment = {
                id_fk_pokemon: getPokemonID(),
                id_fk_usuario: userID,
                texto: userComment.value,
               // fecha:
               //calificacion: parseInt(calificacion.value)
            }
            // Envía el JSON al método para postear el comentario
            postComment(comment);
            // Limpia los campos en la pagina
           // formPostComment.userComment = null;
        //    formPostComment.rating = null;
        }
    }
});
 */
/**
 *  Obtener el id del pokemon desde un atributo HTML.
 */
 function getPokemonID() {
    return parseInt(document.querySelector('#seccionComentario').getAttribute('pokemonID'));
}

$(document).ready(function (){
    getPokemonComments();
    /*
    fetch('api/comments/4')
     .then( response =>{ 
     //    console.log("Respuesta: ",response);
        return response.json();
     //    console.log("Respuesta JSON: ",response.json());
     })
     .then (pokemonComments => {
         console.log(pokemonComments);
         if (pokemonComments == null) {
             // Hubo un error
             listaComentarios.error = true;
         }
         else {
             // Obtengo todos los comentarios de un pokemon y lo guardo en la lista de comentarios
             listaComentarios.pokemonComments = pokemonComments;
        //     averageRating.users_rating = getAverage(ins_comments);
         }
         // Termina la carga de informacion
         listaComentarios.loading = false;
        // averageRating.loading = false;
     })
     .catch(exception => console.log(exception));
     */
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
    /*
    .then( response =>{ 
        if (response.status == 200)
        {
            return response.json();
            
        }else{
            return null;
        }
    })
    .then(response => {
        // Desde la API se recibe true si esta todo ok.
        if (response == true) {
            alert('Comentario eliminado');
            getPokemonComments();
        }
        else
            alert('no se pudo borrar comentario');
    })
    */
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