<?php

require_once('Model.php');

class ModelTipoElemental extends Model {

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
    function getTipo_elemetal($id){
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
    function newtipo_elemental($nombre, $imagen_tipo) {
        $query = $this->getDb()->prepare('INSERT INTO tipo_elemental (nombre, imagen_tipo) VALUES (?, ?)');
        $query->execute([$nombre, $imagen_tipo]);
    }

    /**
     * @param $id
     * Elimina un tipo_elemental en base al id pasado por parámetro
     */
    function deletetipo_elemental($id) {
        $query = $this->getDb()->prepare('DELETE FROM tipo_elemental WHERE id_tipo_elemental = ?');
        $query->execute([$id]);
    }

     /**
     * @param $id
     * Actualiza un tipo_elemental en base al id pasado por parámetro
     */
    function updatetipo_elemental($nombre, $imagen_tipo, $id_tipo_elemental){
        $query = $this-> getDb()->prepare('UPDATE tipo_elemental SET nombre = ?, imagen_tipo = ? WHERE id_tipo_elemental = ?');
        $query->execute([$nombre, $imagen_tipo, $id_tipo_elemental]);
    }
}
