<?php

function session(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=team;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //foreach($db->query('SELECT * FROM usuarios') as $row){
        //    print_r($row);
        //}
        return $db;
    } catch (PDOException $e){
        print "ERROR ". $e.getMessage() . "</br>";
        die();
    }
}

function validateLogin($usuario,$password){
    $db = session();
    $query = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario and password = :password");
    $query->bindParam(':usuario', $usuario);
    $query->bindParam(':password', $password);
    $query->execute();
    $fila = $query->fetch();
    return $fila;
}

function getProducts(){
    $db = session();
    $query = $db->prepare("SELECT * FROM productos");
    $query->execute();
    $filas = $query->fetch();
    return $filas;
}

?>