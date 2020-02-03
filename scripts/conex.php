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
    $cons = "SELECT a.usuario, b.telefono, c.correo FROM usuarios a INNER JOIN
    telefono b ON(a.id=b.id) INNER JOIN correo c ON (a.id = c.id) WHERE 
    a.usuario = :usuario and a.password = :password";
    $query = $db->prepare($cons);
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
    $filas = $query->fetchAll();
    return $filas;
}

?>