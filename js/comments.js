'use strict';

//Obtiene el ID desde el url
 function getPokemonID() {
    let urlParts = window.location.href.split('/');
    return parseInt(urlParts[urlParts.length - 1]);
}

// Recupera el valor de las estrellas, si todavia no se eligio ninguna devuelve 0
function getStarValue()
{
    let star = document.querySelector('input[name="rating"]:checked');
    if ( star != null)
        return star.value;
    else
        return 0;
}

//Limpia los datos del comentario
function resetData()
{
    //Limpia el textarea
    document.getElementById("userComment").value= "";
    //Limpia las estrellas
    document.querySelector('input[name="rating"]:checked').checked = false;

}

//////////////////// ZONA DE API REST ////////////////////

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
            // Hubo un error
            listaComentarios.error = true;
        }
        else{
            if (pokemonComments == "Sin comentarios") {
            listaComentarios.notComment=true;
            }
            else {
                // Obtengo todos los comentarios de un pokemon y lo guardo en la lista de comentarios
                listaComentarios.pokemonComments = pokemonComments;
            }
        }
        // Termina la carga de informacion
        listaComentarios.loading = false;
        
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

//////////////////// FIN ZONA DE API REST ////////////////////

// Pide cargar los comentarios ni bien se carga la página
$(document).ready(function (){
    getPokemonComments();
});


//////////////////// ZONA DE VUE ////////////////////
let listaComentarios = new Vue({
    //nombre del div donde se carga
    el: '#comments', 
    data: {
        error: false,
        //lo pone en true ya que los metodos se encargaran de ponerlo en false cuando terminen
        loading: true,
        notComment: false,
         // Muestra si la sesion es de un admin
        visible: document.querySelector("#seccionComentario").getAttribute('visible') == 1,
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
        //Oculta si no hay una sesion activa
        visible: document.querySelector("#seccionComentario").getAttribute('visible')
    },
    methods: 
    {
        // Responde al botón en el formulario de Vue
        guardarComentario: function(e) {
            // Previene la recarga automática de la página
            e.preventDefault(e);
            // Prepara un json
            let comment = {
                pokemon: getPokemonID(), 
                calificacion: getStarValue(),
                texto: userComment.value
            }
            // Envía el JSON al método para postear el comentario asegurando que se puso una valoracion        
            if ( comment.calificacion != 0)
            {
                newPokemonComment(comment);
                // Limpia los campos en la pagina
                resetData();
            }
            else{
                alert('No olvides dar una nota ;-)');
            }
        },
    },
});
//////////////////// FIN ZONA DE VUE ////////////////////