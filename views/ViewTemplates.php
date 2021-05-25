<?php

require_once('View.php');

class ViewTemplates extends View {

    function ShowHomeVista (){
        $this->getSmarty()->assign('home',BASE_URL.'home');
        $this->getSmarty()->display('templates/home.tpl');
    }

    function ShowPokedexVista ($listaPokemones){
        $this->getSmarty()->assign('listaPokemons',$listaPokemones);
        $this->getSmarty()->display('templates/tablaPokedex.tpl');
    }
}
