<?php

require_once('View.php');

class ViewTemplate extends View {

    function ShowDetails (){
        $this->getSmarty()->display('templates/home.tpl');
    }
}
