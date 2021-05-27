<?php

require_once('libs/smarty/Smarty.class.php');

class View  {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $authHelper = new AuthHelper();
        $username = $authHelper->getLoggedUserName();
        $this->getSmarty()->assign('username', $username);
    }    

    public function getSmarty() {
        return $this->smarty;        
    }

    public function isLogged()
    {
        
    }
}
