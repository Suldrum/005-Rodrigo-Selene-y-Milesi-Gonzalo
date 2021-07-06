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
     * Retorna todos los pokemons en la tabla Pokemon que pertenezcan a una region pasada por parametro
     */
    function getAllByRegion($id_region) {
/*
        $query = $this->getDb()->prepare('SELECT * FROM pokemon WHERE id_region = ? ORDER BY id_pokemon ASC');
        $query->execute([$id_region]);
        return $query->fetchAll(PDO::FETCH_OBJ);
        */
        $id_region = 20;
        $query = $this->getDb()->prepare('SELECT * FROM pokemon LIMIT 10 OFFSET 5');
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

        /**
     * @param $id
     * @return mixed
     * Retorna todos los pokemons en la tabla Pokemon que pertenezcan a sean de un tipo pasado por parametro
     */
    function getAllByType($id_tipo_elemental) {

        $query = $this->getDb()->prepare('SELECT * FROM pokemon WHERE (id_tipo_elemental = ? OR id_tipo_elemental2 = ? ) ORDER BY id_pokemon ASC');
        $query->execute([$id_tipo_elemental,$id_tipo_elemental]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $id_region,$id_tipo_elemental
     * @return mixed
     * Retorna todos los pokemons en la tabla Pokemon que sean de una region y de un tipo elemental pasados por parametro
     */
    function getAllFiltro($id_region,$id_tipo_elemental) {

        $query = $this->getDb()->prepare('SELECT * FROM pokemon WHERE (id_region = ? AND (id_tipo_elemental = ? OR id_tipo_elemental2 = ? )) ORDER BY id_pokemon ASC');
        $query->execute([$id_region, $id_tipo_elemental,$id_tipo_elemental]);
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
        $query = $this->getDb()->prepare('INSERT INTO pokemon (id_pokemon, id_region, nombre, imagen_pokemon, id_tipo_elemental, id_tipo_elemental2) VALUES (?, ?, ?, ?, ?, ?)');
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
    function updatePokemon($id_region, $nombre, $imagen, $id_tipo_elemental, $id_tipo_elemental2, $id_pokemonViejo){
        $query = $this-> getDb()->prepare('UPDATE pokemon SET id_region = ?, nombre = ?, imagen_pokemon = ?, id_tipo_elemental = ?, id_tipo_elemental2 = ? WHERE id_pokemon = ?');
        $query->execute([$id_region, $nombre, $imagen, $id_tipo_elemental, $id_tipo_elemental2,$id_pokemonViejo]);
    }

     /**
     * @param $inicio
     * Muestra 5 pokemons por paginado
     * SELECT * FROM `pokemon` ORDER BY nombre ASC LIMIT 10 OFFSET 8 
     */
    function paginationPokemon($inicio){
        $query = $this-> getDb()->prepare('SELECT * FROM `pokemon` LIMIT 10 OFFSET ?');
        $query->execute([$inicio]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
