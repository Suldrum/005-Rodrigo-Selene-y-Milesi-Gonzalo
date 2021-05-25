<?php

require_once('Model.php');

class AdminModel extends Model {

    public function getUserByUsername($email) {
        $query = $this->getDb()->prepare('SELECT * FROM `administrador` WHERE email = ?');
        $query->execute(array(($email)));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($name, $lastName, $username, $email, $pass) {

        $passEnc = password_hash($pass, PASSWORD_DEFAULT);

        $query = $this->getDb()->prepare('INSERT INTO `administrador` (nombre, apellido, email, contraseña) 
                                            VALUES (?, ?, ?, ?)');

        $query->execute([$name, $lastName, $username, $email, $passEnc]);

    }
}