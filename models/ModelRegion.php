<?php

require_once('Model.php');

class ModelRegion extends Model {

    /**
     * @return array
     * Retorna todas los regiones en la tabla region ordenados por numero de la pokedex
     */
    function getAll() {

        $query = $this->getDb()->prepare('SELECT * FROM region ORDER BY id_region ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * @param $id
     * @return mixed
     * Retorna una tupla a partir de un id pasado por parámtro
     */
    function getregion($id){
        $query = $this-> getDb()->prepare('SELECT * FROM region WHERE id_region = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

        /**
     * @param "$id_region, $nombre, $imagen_region"
     * Crea una tarea a partir de los parámetros pasados
     */
    function newRegion($id_region, $nombre, $imagen_region) {
        $query = $this->getDb()->prepare('INSERT INTO region ($id_region, $nombre, $imagen_region) VALUES (?, ?, ?)');
        $query->execute([$id_region, $nombre, $imagen_region]);
    }

    /**
     * @param $id
     * Elimina un region en base al id pasado por parámetro
     */
    function deleteRegion($id) {
        $query = $this->getDb()->prepare('DELETE FROM region WHERE id_region = ?');
        $query->execute([$id]);
    }

     /**
     * @param $id
     * Actualiza un region en base al id pasado por parámetro
     */
    function updateRegion($id_region, $nombre, $imagen_region){
        $query = $this-> getDb()->prepare('UPDATE region SET nombre = ?, imagen_region = ? WHERE id_region = ?');
        $query->execute([$id_region, $nombre, $imagen_region]);
    }
}
