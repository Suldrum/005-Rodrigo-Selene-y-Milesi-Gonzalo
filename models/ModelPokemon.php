<?php

require_once('Model.php');

class ModelPokemon extends Model {

    private function getTarget() {
        $target = 'imagenes/Pokemon/'.uniqid().'.jpg';
        return $target;
    }

    private function saveImage($image, $target) {
        move_uploaded_file($image, $target);
    }
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
        $query = $this->getDb()->prepare('SELECT * FROM pokemon WHERE id_region = ? ORDER BY id_pokemon ASC');
        $query->execute([$id_region]);
        return $query->fetchAll(PDO::FETCH_OBJ);
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
        $pathImg = $this->getTarget();
        $query = $this->getDb()->prepare('INSERT INTO pokemon (id_pokemon, id_region, nombre, imagen_pokemon, id_tipo_elemental, id_tipo_elemental2) VALUES (?, ?, ?, ?, ?, ?)');
        $success = $query->execute([$id_pokemon, $id_region, $nombre, $pathImg, $id_tipo_elemental, $id_tipo_elemental2]);
        if($success && isset($pathImg)) 
            $this->saveImage($imagen, $pathImg);
        return $success;
    }

     /**
     * @param $id
     * Actualiza un pokemon en base al id pasado por parámetro
     */
    function updatePokemon($id_region, $nombre, $imagen, $id_tipo_elemental, $id_tipo_elemental2, $id_pokemonViejo){
        $pathImg = $this->getTarget();
        $query = $this-> getDb()->prepare('UPDATE pokemon SET id_region = ?, nombre = ?, imagen_pokemon = ?, id_tipo_elemental = ?, id_tipo_elemental2 = ? WHERE id_pokemon = ?');
        $success = $query->execute([$id_region, $nombre, $pathImg, $id_tipo_elemental, $id_tipo_elemental2,$id_pokemonViejo]);
        if($success && isset($pathImg)) 
            $this->saveImage($imagen, $pathImg);
        return $success;
    }

        /**
     * @param $id
     * Elimina un pokemon en base al id pasado por parámetro
     */
    function deletePokemon($id) {
        $query = $this->getDb()->prepare('DELETE FROM pokemon WHERE id_pokemon = ?');
        $query->execute([$id]);
    }


    function countPokemon()
    {
        $query = $this->getDb()->prepare('SELECT COUNT(*) AS total FROM pokemon');
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function countPokemonFilterByType($id_tipo_elemental)
    {
        $query = $this->getDb()->prepare('SELECT COUNT(*) AS total FROM pokemon WHERE (id_tipo_elemental = ? OR id_tipo_elemental2 = ? )');
        $query->execute([$id_tipo_elemental]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function countPokemonFilterByRegion($id_region)
    {
        $query = $this->getDb()->prepare('SELECT COUNT(*) AS total FROM pokemon WHERE id_region = ?');
        $query->execute([$id_region]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    function countPokemonFilterAll($id_region,$id_tipo_elemental)
    {
        $query = $this->getDb()->prepare('SELECT COUNT(*) AS total FROM pokemon WHERE (id_region = ? AND (id_tipo_elemental = ? OR id_tipo_elemental2 = ? )) ORDER BY id_pokemon ASC');
        $query->execute([$id_region,$id_tipo_elemental]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
     /**
     * @param $pagina
     * Muestra 10 pokemons desde una posicion de la tabla pasada por parametro
     *
     */
    
    function paginationPokemon($offset, $rowsPerPage){
        $sql = "SELECT * FROM pokemon LIMIT $offset, $rowsPerPage";
        $query = $this->getDb()->prepare($sql);  
        $query ->execute(); 
        return( $query->fetchAll(PDO::FETCH_OBJ));
    }
}
