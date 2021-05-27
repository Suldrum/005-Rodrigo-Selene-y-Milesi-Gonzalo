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
    function getRegion($id){
        $query = $this->getDb()->prepare('SELECT * FROM region WHERE id_region = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

        /**
     * @param "$nombre, $imagen_region"
     * Crea una regiona a partir de los parámetros pasados
     */
    function newRegion($nombre, $imagen_region) {
        $query = $this->getDb()->prepare('INSERT INTO region (nombre, imagen_region) VALUES (?, ?)');
        $query->execute([$nombre, $imagen_region]);
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
    function updateRegion($nombre, $imagen_region, $id_region){
        $query = $this-> getDb()->prepare('UPDATE region SET nombre = ?, imagen_region = ? WHERE id_region = ?');
        $query->execute([$nombre, $imagen_region, $id_region]);
    }
}
