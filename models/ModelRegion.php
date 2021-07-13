<?php

require_once('Model.php');

class ModelRegion extends Model {


    private function getTarget() {
        $target = 'imagenes/Region/'.uniqid().'.jpg';
        return $target;
    }

    private function saveImage($image, $target) {
        move_uploaded_file($image, $target);
    }

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
        $pathImg = $this->getTarget();
        $query = $this->getDb()->prepare('INSERT INTO region (nombre, imagen_region) VALUES (?, ?)');
        $success = $query->execute([$nombre, $pathImg]);
        if($success && isset($pathImg)) 
            $this->saveImage($imagen_region, $pathImg);
        return $success;
    }

     /**
     * @param $id
     * Actualiza un region en base al id pasado por parámetro
     */
    function updateRegion($nombre, $imagen_region, $id_region){
        $pathImg = $this->getTarget();
        $query = $this->getDb()->prepare('UPDATE region SET nombre = ?, imagen_region = ? WHERE id_region = ?');
        $success = $query->execute([$nombre, $pathImg, $id_region]);
        if($success && isset($pathImg)) 
            $this->saveImage($imagen_region, $pathImg);
        return $success;
    }

    /**
     * @param $id
     * Elimina un region en base al id pasado por parámetro
     */
    function deleteRegion($id) {
        $query = $this->getDb()->prepare('DELETE FROM region WHERE id_region = ?');
        $query->execute([$id]);
    }

}
