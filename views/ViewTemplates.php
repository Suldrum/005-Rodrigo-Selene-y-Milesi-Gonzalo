<?php

require_once('View.php');

class ViewTemplates extends View {

    function ShowHomeVista (){
        $this->getSmarty()->assign('home',BASE_URL.'home');
        $this->getSmarty()->display('templates/home.tpl');
    }

    function showUsuarios() {
        $this->getSmarty()->assign('home',BASE_URL.'home');
        $this->getSmarty()->display('templates/tablaUsuarios.tpl');
    }  
    function ShowPokedexVista ($listaPokemones,$listaRegiones,$listaTipos){
        $this->getSmarty()->assign('title', "Tabla - Pokedex");
        $this->getSmarty()->assign('listaPokemons',$listaPokemones);
        $this->getSmarty()->assign('listaRegiones',$listaRegiones);
        $this->getSmarty()->assign('listaTipos',$listaTipos);
        $this->getSmarty()->display('templates/tablaPokedex.tpl');
    }

    function ShowTarjetaVistaPokemon ($pokemon, $Region, $tipo1, $tipo2){
        $this->getSmarty()->assign('tarjetaPokemon',$pokemon);
        $this->getSmarty()->assign('regionPokemon',$Region);
        $this->getSmarty()->assign('tipoElemental1',$tipo1);
        if ($tipo2 != NULL) {
            $this->getSmarty()->assign('tipoElemental2',$tipo2->imagen_tipo);
        }else{
            $this->getSmarty()->assign('tipoElemental2',$tipo2);
        }    
        $this->getSmarty()->display('templates/tarjetaPokemon.tpl');
    }

    function ShowRegionVista ($listaRegiones){
        $this->getSmarty()->assign('title', "Regiones");
        $this->getSmarty()->assign('listaRegiones',$listaRegiones);
        $this->getSmarty()->display('templates/regiones.tpl');
    }
}
