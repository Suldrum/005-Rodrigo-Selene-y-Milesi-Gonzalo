<?php

require_once('Model.php');

class UserModel extends Model {

    public function getUserByUsername($username) {
        $query = $this->getDb()->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getUserByID($id) {
        $query = $this->getDb()->prepare('SELECT * FROM usuario WHERE ID = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($name, $lastName, $email, $pass) {

        $passEnc = password_hash($pass, PASSWORD_DEFAULT);
        $query = $this->getDb()->prepare('INSERT INTO usuario (nombre, apellido, email, contraseña) VALUES (?, ?, ?, ?)');
        $query->execute([$name, $lastName, $email, $passEnc]);

    }

    function getAll() {

        $query = $this->getDb()->prepare('SELECT * FROM usuario ORDER BY ID ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function deleteUser($id) {
        $query = $this->getDb()->prepare('DELETE FROM usuario WHERE ID = ?');
        $query->execute([$id]);
    }

    public function altaAdmin($id) {

        $query = $this->getDb()->prepare('UPDATE usuario SET administrador = 1 WHERE ID = ?');
        $query->execute([$id]);

    }

    public function bajaAdmin($id) {

        $query = $this->getDb()->prepare('UPDATE usuario SET administrador = 0 WHERE ID = ?');
        $query->execute([$id]);

    }

    function countAdmin()
    {
        $query = $this->getDb()->prepare('SELECT COUNT(*) AS total FROM usuario WHERE administrador = 1');
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>