<?php

require_once('Model.php');

class AdminModel extends Model {

    public function getAdminByUsername($email) {
        $query = $this->getDb()->prepare('SELECT * FROM administrador WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($name, $lastName, $email, $pass) {

        $passEnc = password_hash($pass, PASSWORD_DEFAULT);

        $query = $this->getDb()->prepare('INSERT INTO administrador (nombre, apellido, email, contraseña) 
                                            VALUES (?, ?, ?, ?)');

        $query->execute([$name, $lastName, $email, $passEnc]);

    }
}