<?php

require_once('Model.php');

class ModelPokemon extends Model {

    /**
     * @return array
     * Retorna todas los pokemons en la tabla Pokemon ordenados por numero de la pokedex
     */
    function getAll() {

        $query = $this->getDb()->prepare('SELECT * FROM pokemon ORDER BY id_pokemon ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * @param $id
     * @return mixed
     * Retorna una tupla a partir de un id pasado por parámtro
     */
    function getPokemon($id){
        $query = $this-> getDb()->prepare('SELECT * FROM pokemon WHERE id_pokemon = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

        /**
     * @param "$id_pokemon, $id_region, $nombre, $imagen, $id_tipo_elemental, $id_tipo_elemental2
     * Crea una tarea a partir de los parámetros pasados
     */
    function newPokemon($id_pokemon, $id_region, $nombre, $imagen, $id_tipo_elemental, $id_tipo_elemental2) {
        $query = $this->getDb()->prepare('INSERT INTO pokemon (id_pokemon, id_region, nombre, imagen, id_tipo_elemental, id_tipo_elemental2) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$id_pokemon, $id_region, $nombre, $imagen, $id_tipo_elemental, $id_tipo_elemental2]);
    }

    /**
     * @param $id
     * Elimina un pokemon en base al id pasado por parámetro
     */
    function deletePokemon($id) {
        $query = $this->getDb()->prepare('DELETE FROM pokemon WHERE id_pokemon = ?');
        $query->execute([$id]);
    }

     /**
     * @param $id
     * Actualiza un pokemon en base al id pasado por parámetro
     */
    function updatePokemon($id_pokemon, $id_region, $nombre, $imagen, $id_tipo_elemental, $id_tipo_elemental2n){
        $query = $this-> getDb()->prepare('UPDATE pokemon SET id_region = ?, nombre = ?, imagen = ?, id_tipo_elemental = ?, id_tipo_elemental2 = ? WHERE id_pokemon = ?');
        $query->execute([$nombre,$autor,$categoria,$descripcion,$imagen,$id]);
    }
}
