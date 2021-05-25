<?php

require_once('Model.php');

class UserModel extends Model {

    public function getUserByUsername($username) {
        $query = $this->getDb()->prepare('SELECT * FROM `entrenador` WHERE apodo = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($name, $lastName, $username, $email, $pass) {

        $passEnc = password_hash($pass, PASSWORD_DEFAULT);

        $query = $this->getDb()->prepare('INSERT INTO `entrenador` (nombre, apellido, apodo, email, contraseña) 
                                            VALUES (?, ?, ?, ?, ?)');

        $query->execute([$name, $lastName, $username, $email, $passEnc]);

    }
}