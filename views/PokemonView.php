<?php

require_once('View.php');

class PokemonView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showActualizarPokemon($pokemon,$regiones,$tipos) {
        $this->getSmarty()->assign('title', "Actualizar Pokemon");
        $this->getSmarty()->assign('pokemonActual',$pokemon);  
        $this->getSmarty()->assign('listaTipos', $tipos);  
        $this->getSmarty()->assign('listaRegiones', $regiones);
        $this->getSmarty()->display('templates/pokemonActualizar.tpl');
    }

    public function showCrearPokemon($regiones, $tipos) {
        $this->getSmarty()->assign('title', "Crear Pokemon");
        $this->getSmarty()->assign('error', null);
        $this->getSmarty()->assign('listaTipos', $tipos);  
        $this->getSmarty()->assign('listaRegiones', $regiones);       
        $this->getSmarty()->assign('home', BASE_URL.'home');
        $this->getSmarty()->display('templates/pokemonNew.tpl');
    }
}