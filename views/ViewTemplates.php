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
        $url =str_replace('?', '/', $_SERVER["REQUEST_URI"]);
        $urlParts = explode('/', $url);
        $this->getSmarty()->assign('url',$urlParts);
        $this->getSmarty()->display('templates/tablaPokedex.tpl');
    }

    function ShowTarjetaVistaPokemon ($pokemon){
        $this->getSmarty()->assign('tarjetaPokemon',$pokemon);
        $this->getSmarty()->display('templates/tarjetaPokemon.tpl');
    }

    function ShowRegionVista ($listaRegiones){
        $this->getSmarty()->assign('title', "Regiones");
        $this->getSmarty()->assign('listaRegiones',$listaRegiones);
        $this->getSmarty()->display('templates/regiones.tpl');
    }
}
