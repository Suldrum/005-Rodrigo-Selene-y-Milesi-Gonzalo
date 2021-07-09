'use strict';

/**
 *  Obtener el id del pokemon desde un atributo HTML.
 */
 function getPokemonID() {
    return parseInt(document.querySelector('#seccionComentario').getAttribute('pokemonID'));
}

/**
 *  Obtener el id del usuario desde un atributo HTML.
 */
function getUserID() {
    return document.querySelector('#seccionComentario').getAttribute('userID');
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
            deletePokemonComment(commentID);
            
        }
    }
});


let nuevoComentario = new Vue({
    //nombre del div donde se carga
    el:'#newComment',
    data: {
        userComment: null,
    //    puntaje: null,
    },
    methods: { 
        // Responde al botón en el formulario de Vue
        guardarComentario: function(e) {
            // Previene la recarga automática de la página
            e.preventDefault(e);
            // Prepara un JSON con los datos del comentario y del autor
            let comment = {
                id_fk_pokemon: getPokemonID(),
            //    id_fk_usuario: getUserID(),
                id_fk_usuario: 3,
                calificacion: 4,
                texto: userComment.value
                //calificacion: parseInt(puntaje.value)
                
            }
            // Envía el JSON al método para postear el comentario
            newPokemonComment(comment);
            // Limpia los campos en la pagina
           // formPostComment.userComment = null;
        //    formPostComment.rating = null;
        }
    }
});

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