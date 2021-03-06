<?php
session_start();
include("scripts/conex.php");
if(!isset($_SESSION['nombre'])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="card text-center" id="formP">
        <div class="card-header">
            <h5>Ingesar Usuario</h5>
        </div>
        <form class="form-group">
            <div class="card-body">
                <h6>Usuario</h6>
                <input type="text" name="user" id="user" required="">
                <h6>Contraseña</h6>
                <input type="password" name="passwd" id="pass" required="">
            </div>
            <div class="card-footer text-muted" id="respuesta">
                <input type="submit" class="btn btn-success send" id="enviar" value="Ingresar">
            </div>
        </form>
    </div>
</body>
</html>

<script>
$(document).ready(function(){
    $(".send").click(function(){
        if($("#user").val()!=null && $("#pass").val()!=null){
            $.ajax({
                type:"GET",
                cache:false,
                url:"scripts/ingresar.php",
                data:{user : $("#user").val(), pass: $("#pass").val()},
                success: function(html){
                    $("#respuesta").html(html);
                }
            });
        }
    });
});



</script>