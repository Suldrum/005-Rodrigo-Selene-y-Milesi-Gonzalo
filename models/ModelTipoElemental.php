<?php

require_once('Model.php');

class ModelTipoElemental extends Model {

    private function getTarget() {
        $target = 'imagenes/Tipo_Elemental/'.uniqid().'.jpg';
        return $target;
    }

    private function saveImage($image, $target) {
        move_uploaded_file($image, $target);
    }
    /**
     * @return array
     * Retorna todas los tipos elementales en la tabla tipo_elemental ordenados por id
     */
    function getAll() {
        $query = $this->getDb()->prepare('SELECT * FROM tipo_elemental ORDER BY id_tipo_elemental ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * @param $id
     * @return mixed
     * Retorna una tupla a partir de un id pasado por parámtro
     */
    function getTipo_Elemental($id){
        if ($id != NULL) {
            $query = $this-> getDb()->prepare('SELECT * FROM tipo_elemental WHERE id_tipo_elemental = ?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }else{
            return NULL;
        }  
    }

        /**
     * @param "$id_tipo_elemental, $nombre, $imagen_tipo"
     * Crea una tarea a partir de los parámetros pasados
     */
    function newTipo_Elemental($nombre, $imagen_tipo) {
        $pathImg = $this->getTarget();
        $query = $this->getDb()->prepare('INSERT INTO tipo_elemental (nombre, imagen_tipo) VALUES (?, ?)');
        $success = $query->execute([$nombre, $pathImg]);
        if($success && isset($pathImg)) 
            $this->saveImage($imagen_tipo, $pathImg);
        return $success;
    }

    /**
     * @param $id
     * Elimina un tipo_elemental en base al id pasado por parámetro
     */
    function deleteTipo_Elemental($id) {
        $query = $this->getDb()->prepare('DELETE FROM tipo_elemental WHERE id_tipo_elemental = ?');
        $query->execute([$id]);
    }

     /**
     * @param $id
     * Actualiza un tipo_elemental en base al id pasado por parámetro
     */
    function updateTipo_Elemental($nombre, $imagen_tipo, $id_tipo_elemental){
        $pathImg = $this->getTarget();
        $query = $this-> getDb()->prepare('UPDATE tipo_elemental SET nombre = ?, imagen_tipo = ? WHERE id_tipo_elemental = ?');
        $success = $query->execute([$nombre, $pathImg, $id_tipo_elemental]);
        if($success && isset($pathImg)) 
            $this->saveImage($imagen_tipo, $pathImg);
        return $success;
    }
}
