<?php

require_once('Model.php');

class ModelComentario extends Model {

    /**
     * @return array
     * Retorna todos los comentarios en la tabla comentario ordenados por id_comentario
     */
    function getAll() {

        $query = $this->getDb()->prepare('SELECT * FROM comentario ORDER BY id_comentario ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * @param $id
     * @return mixed
     * Retorna una tupla a partir de un id pasado por parámtro
     */
    function getComment($id){
        $query = $this->getDb()->prepare('SELECT * FROM comentario WHERE id_comentario = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param $id
     * @return mixed
     * Retorna todos los comentarios sobre un pokemon
     */
    function getPokemonComments($id){
        $query = $this->getDb()->prepare('SELECT * FROM comentario WHERE id_fk_pokemon = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

        /**
     * @param "$pokemon, $usuario, $calificacion, $texto"
     * Crea un comentario a partir de los parámetros pasados
     */
    function newPokemonComment($pokemon, $usuario, $calificacion, $texto) {
        $query = $this->getDb()->prepare('INSERT INTO comentario (id_fk_pokemon, id_fk_usuario, calificacion, texto) VALUES (?, ?, ?, ?)');
        $query->execute([$pokemon, $usuario, $calificacion, $texto]);
    }

    /**
     * @param $id
     * Elimina un comentario en base al id pasado por parámetro
     */
    function deleteComment($id) {
        $query = $this->getDb()->prepare('DELETE FROM comentario WHERE id_comentario = ?');
        $query->execute([$id]);
    }
}
