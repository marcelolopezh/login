<?php

include("conex.php");
session_start();
$db = session();
$user = $_GET['user'];
$pass = $_GET['pass'];
if($user!="" && $pass!=""){
try {  
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $db->beginTransaction();

    $cons = "INSERT INTO usuarios (usuario,password) VALUES (:user,:pass)";
    $query = $db->prepare($cons);
    $query->bindParam(':user', $user);
    $query->bindParam(':pass', $pass);
    $db->execute($query);
    $db->commit();

    echo '<input type="submit" class="btn btn-success send" id="enviar" value="Ingresar"><br><br>
        <div class="alert alert-success" role="alert">
        Rellena todos los campos
        </div>'; 
        
  } catch (Exception $e) {
    $mbd->rollBack();
    echo "Fallo: " . $e->getMessage();
  }
}else{
    echo '<input type="submit" class="btn btn-success send" id="enviar" value="Ingresar"><br><br>
            <div class="alert alert-danger" role="alert">
           Rellena todos los campos
           </div>';

}
?>