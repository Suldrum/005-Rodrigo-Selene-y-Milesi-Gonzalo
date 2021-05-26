<?php

/**
 * @return PDO
 * Retorna una conexión a la BD
 */
function connect() {
	return new PDO('mysql:host=localhost:3308;dbname=db_pokemon;charset=utf8', 'root', '');
}

/**
 * @return array
 * Retorna todas las tareas almacenadas en la tabla task
 */
function getTasks() {
	$db = connect();
	$query = $db->prepare('SELECT * FROM task ORDER BY priority ASC');
	$query->execute();
	return $query->fetchAll(PDO::FETCH_OBJ);
}

/**
 * @param $id
 * @return mixed
 * Retorna una tupla a partir de un id pasado por parámtro
 */
function getTask($id) {
	$db = connect();
	$query = $db->prepare('SELECT * FROM task WHERE id = ?');
	$query->execute(array(($id)));
	return $query->fetch(PDO::FETCH_OBJ);
}

/**
 * @param $title, $priority, $description
 * Crea una tarea a partir de los parámetros title, priority y description
 */
function newTaskDB($title, $priority, $description) {
	$db = connect();
	$query = $db->prepare('INSERT INTO task (title, priority, description, completed) VALUES (?, ?, ?, false)');
	$query->execute([$title, $priority, $description]);
}

/**
 * @param $id
 * Elimina una tarea en base al id pasado por parámetro
 */
function deleteTaskDB($id) {
	$db = connect();
	$query = $db->prepare('DELETE FROM task WHERE id = ?');
	$query->execute([$id]);
}

/**
 * @param $id
 * Elimina una tarea en base al id pasado por parámetro
 */
function endTaskDB($id) {
	$db = connect();
	$query = $db->prepare('UPDATE task SET completed = true WHERE id = ?');
	$query->execute([$id]);
}
