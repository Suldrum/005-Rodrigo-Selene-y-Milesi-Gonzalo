<?php

require_once('Model.php');

class ModelTipoElemental extends Model {

    /**
     * @return array
     * Retorna todas los tipos elementales en la tabla tipo_elemetal ordenados por id
     */
    function getAll() {

        $query = $this->getDb()->prepare('SELECT * FROM tipo_elemetal ORDER BY id_tipo_elemetal ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * @param $id
     * @return mixed
     * Retorna una tupla a partir de un id pasado por parámtro
     */
    function getTipo_elemetal($id){
        $query = $this-> getDb()->prepare('SELECT * FROM tipo_elemetal WHERE id_tipo_elemetal = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

        /**
     * @param "$id_tipo_elemetal, $nombre, $imagen_tipo"
     * Crea una tarea a partir de los parámetros pasados
     */
    function newTipo_elemetal($id_tipo_elemetal, $nombre, $imagen_tipo) {
        $query = $this->getDb()->prepare('INSERT INTO tipo_elemetal (id_tipo_elemetal, nombre, imagen_tipo) VALUES (?, ?, ?)');
        $query->execute([$id_tipo_elemetal, $nombre, $imagen_tipo]);
    }

    /**
     * @param $id
     * Elimina un tipo_elemetal en base al id pasado por parámetro
     */
    function deleteTipo_elemetal($id) {
        $query = $this->getDb()->prepare('DELETE FROM tipo_elemetal WHERE id_tipo_elemetal = ?');
        $query->execute([$id]);
    }

     /**
     * @param $id
     * Actualiza un tipo_elemetal en base al id pasado por parámetro
     */
    function updateTipo_elemetal($id_tipo_elemetal, $nombre, $imagen_tipo){
        $query = $this-> getDb()->prepare('UPDATE tipo_elemetal SET nombre = ?, imagen_tipo = ? WHERE id_tipo_elemetal = ?');
        $query->execute([$id_tipo_elemetal, $nombre, $imagen_tipo]);
    }
}
