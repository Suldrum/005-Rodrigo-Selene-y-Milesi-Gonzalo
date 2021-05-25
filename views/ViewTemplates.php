<?php

require_once('View.php');

class ViewTemplate extends View {

    function ShowHomeVista (){
        $this->getSmarty()->display('templates/home.tpl');
    }
}
