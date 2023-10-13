<?php
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "";
    $db = "romantechmx";

    $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

    if($conexion->connect_error){
        die("Conexion fallida: ".$conexion->connect_error);
    }

    if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['pass'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];

        $sql = "INSERT INTO `usuarios` (`Nombre`, `Correo`, `Password`) 
                                VALUES ('$nombre', '$correo', '$pass')";

        if($conexion->query($sql) === true){

        }
        else{
            die("Error al insertar datos: ".$conexion->error);
        }
    }

    header('Location: ../../login.php');
?>