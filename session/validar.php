<?php

include("../scripts/conex.php");
session_start();
$user = $_GET['user'];
$pass = $_GET['pass'];

$validateLog = validateLogin($user,$pass);
if($validateLog!=null){
    $_SESSION['nombre'] = $validateLog[1];
    echo '<img class="gif" width="20%" src="img/gif.gif"><META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">';
}else{
    echo '<img class="gif" width="20%" src="img/gif.gif"><META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">';
}

?>
