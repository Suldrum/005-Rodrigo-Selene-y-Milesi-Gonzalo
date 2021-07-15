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

     /**
     * @param $pagina
     * Muestra 10 pokemons desde una posicion de la tabla pasada por parametro
     *
     */
    /*function paginationPokemon(){
        /*$query = $this-> getDb()->prepare('SELECT * FROM pokemon ORDER BY id_pokemon ASC LIMIT 10 OFFSET '.$pagina);
        $query->execute();
       /* $conn = mysqli_connect('localhost','root','') or trigger_error("SQL", E_USER_ERROR);
        $db = mysqli_select_db('pokemon',$conn) or trigger_error("SQL", E_USER_ERROR);*/
        // find out how many rows are in the table 
       /* $query = $this->getDb()->prepare('SELECT COUNT(*) FROM pokemon');
        $pokeTotal = $query->execute();
     

        // number of rows to show per page
        $rowsPerPage = 7;
        // find out total pages
        $totalpages = ceil($pokeTotal / $rowsPerPage);

        // get the current page or set a default
        if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
        // cast var as int
        $currentpage = (int) $_GET['currentpage'];
        } else {
        // default page num
        $currentpage = 1;
        } // end if

        // if current page is greater than total pages...
        if ($currentpage > $totalpages) {
        // set current page to last page
        $currentpage = $totalpages;
        } // end if
        // if current page is less than first page...
        if ($currentpage < 1) {
        // set current page to first page
        $currentpage = 1;
        } // end if

        // the offset of the list, based on current page 
        $offset = ($currentpage - 1) * $rowsPerPage;

        // get the info from the db 
        $sql = "SELECT id_pokemon FROM pokemon LIMIT $offset, $rowsPerPage";
        $query = $this -> getDb() -> prepare($sql);  
        $query -> execute(); 
        $pagination = $query -> fetchAll(PDO::FETCH_ASSOC); /*mysqli_query($this->getDb(), $sql);*/
        // while there are rows to be fetched...
        /*while ($list = $pagination->fetch_assoc()) {
        // echo data
        echo $list['id_pokemon'] . " : " . $list['pokemon'] . "<br />";
        } // end while

        /******  build the pagination links ******/
        // range of num links to show
      /*  $range = 3;

        // if not on page 1, don't show back links
        if ($currentpage > 1) {
        // show << link to go back to page 1
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
        // get previous page num
        $prevpage = $currentpage - 1;
        // show < link to go back to 1 page
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
        } // end if 

        // loop to show links to range of pages around current page
        for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
        // if it's a valid page number...
        if (($x > 0) && ($x <= $totalpages)) {
            // if we're on current page...
            if ($x == $currentpage) {
                // 'highlight' it but don't make a link
                echo " [<b>$x</b>] ";
            // if not current page...
            } else {
                // make it a link
                echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
            } // end else
        } // end if 
        } // end for
                        
        // if not on last page, show forward and last page links        
        if ($currentpage != $totalpages) {
        // get next page
        $nextpage = $currentpage + 1;
            // echo forward link for next page 
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
        // echo forward link for lastpage
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
        } // end if
        /****** end build pagination links ******/
           /* }*/
}
