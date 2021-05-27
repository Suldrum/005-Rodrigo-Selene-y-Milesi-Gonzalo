<?php

require_once('View.php');

class PokemonView extends View {

    public function __construct() {
        parent::__construct();
    }
//DEXTER DEBERIA ESTAR AQUI SEGUN YO, NO TENGO PRUEBAS PERO TAMPOCO DUDAS

    public function showActualizarPokemon($pokemon) {
        $this->getSmarty()->assign('pokemonActual',$pokemon);  
        $this->getSmarty()->display('templates/pokemonActualizar.tpl');
    }

    public function showCrearPokemon() {
        $this->getSmarty()->assign('title', "Crear Pokemon");
        $this->getSmarty()->assign('error', null);     
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/pokemonNew.tpl');
    }
}