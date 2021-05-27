<?php

class AuthHelper {

    public function __construct() {
    
    }

    static private function start() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    static public function login($user) {
        self::start();
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['ID_USER'] = $user->id_entrenador;
        $_SESSION['USERNAME'] = $user->nombre;
        $_SESSION['IS_ADMIN_LOGGED'] = false;
/*        $_SESSION['USERNICK'] = $user->apodo;
        $_SESSION['USERLASTNAME'] = $user->apellido;
        $_SESSION['USEREMAIL'] = $user->email;
*/
    }

    static public function loginAdmin($user) {
        self::start();
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['ID_USER'] = $user->id_administrador;
        $_SESSION['USERNAME'] = $user->nombre;
        $_SESSION['IS_ADMIN_LOGGED'] = true;
/*        $_SESSION['USERNICK'] = $user->apodo;
        $_SESSION['USERLASTNAME'] = $user->apellido;
        $_SESSION['USEREMAIL'] = $user->email;
*/
    }

    public static function logout() {
        self::start();
        session_destroy();
    }

    public static function checkLoggedIn() {
        self::start();
        if (!isset($_SESSION['ID_USER'])){
            header('Location: ' . BASE_URL . "login");
            die;
        }
    }

    public static function getLoggedUserName() {
        self::start();
        if (isset($_SESSION['USERNAME'])) {
            return $_SESSION['USERNAME'];
        } else {
            return false;
        }
    }

    public static function isAdmin() {
        self::start();
        if (isset($_SESSION['USERNAME'])) {
            return $_SESSION['IS_ADMIN_LOGGED'];
        } else 
            return false;
    }

    public static function getLoggedUser() {
        self::start(); 
        if (isset($_SESSION['USERNAME'])){
            $data=[]; 
            $data['name'] = $_SESSION['USERNAME'];
            $data['admin'] =  $_SESSION['IS_ADMIN_LOGGED'];
           return $data;
        }
        else
            return null;
    }
    
    static public function getAlltUserData(){
        self::start(); 
        if (isset($_SESSION['USERNAME'])){
            $data=[]; 
            $data['name'] = $_SESSION['USERNAME'];
            $data['id'] =  $_SESSION['ID_USER'];
           return $data;
        }
        else
            return null;
    }

}