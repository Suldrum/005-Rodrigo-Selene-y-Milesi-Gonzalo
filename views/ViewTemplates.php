<?php

require_once('View.php');

class ViewTemplates extends View {

    function ShowHomeVista (){
        $this->getSmarty()->assign('home',BASE_URL.'home');
        $this->getSmarty()->display('templates/home.tpl');
    }

    function ShowPokedexVista ($listaPokemones,$listaRegiones,$listaTipos,$cantPaginas){
        $this->getSmarty()->assign('title', "Tabla - Pokedex");
        $this->getSmarty()->assign('listaPokemons',$listaPokemones);
        $this->getSmarty()->assign('listaRegiones',$listaRegiones);
        $this->getSmarty()->assign('listaTipos',$listaTipos);
        $this->getSmarty()->assign('cantPaginas',$cantPaginas);
        $url = explode('/', $_SERVER["REQUEST_URI"]);
        $this->getSmarty()->assign('url',$url[2]);
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
