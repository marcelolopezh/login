<?php
include("conex.inc");
session_start();
$user = $_GET['user'];
$pass = $_GET['pass'];
$query = mysqli_query($con,"SELECT * FROM usuarios where usuario='".$user."' and password='".$pass."'");
if(mysqli_num_rows($query)!=0){
    $_SESSION['nombre'] = $user;
    $query=mysqli_query($con,"select c.usuario, a.telefono, b.correo, c.id from telefono a inner join correo b inner join usuarios c on (c.id=a.id) and (c.id=b.id) where c.usuario = '".$user."'");
    if(mysqli_num_rows($query)!=0){
        if($row=mysqli_fetch_array($query)){
            $_SESSION['nombre'] = $row[0];
            $_SESSION['telefono'] = $row[1];
            $_SESSION['correo'] = $row[2];
            $_SESSION['id'] = $row[3];
        }
    }
    echo '<img class="gif" width="20%" src="gif.gif"><META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">';
}else{
    echo '<img class="gif" width="20%" src="gif.gif"><META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">';
}

?>
