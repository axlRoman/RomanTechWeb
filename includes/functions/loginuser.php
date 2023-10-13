<?php
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = "";
    $db = "romantechmx";

    $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

    if($conexion->connect_error){
        die("Conexion fallida: ".$conexion->connect_error);
    }

    if(isset($_POST['correo']) && isset($_POST['pass'])){
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];

        session_start();
        $_SESSION['correo'] =$correo;

        if($correo==='RomanTech' && $pass==='RTL27'){
            $consulta = "SELECT * FROM `usuarios` WHERE `Correo` LIKE '$correo' AND `Password` LIKE '$pass'";
            $resultado=mysqli_query( $conexion,$consulta);
            $filas =mysqli_num_rows($resultado);

            if($filas){            
                header('Location: ../../admin/addProduct.php');
            }
            else{
                header('Location: ../../login.php');
            }
        }
        else{
            $consulta = "SELECT * FROM `usuarios` WHERE `Correo` LIKE '$correo' AND `Password` LIKE '$pass'";
            $resultado=mysqli_query( $conexion,$consulta);
            $filas =mysqli_num_rows($resultado);

            if($filas){            
                header('Location: ../../index.php');                
            }
            else{
                header('Location: ../../login.php');
            }
        }

        

        mysqli_free_result($resultado);
        mysqli_close($conexion);
    }
?>
<!--
<script languaje="javascript">
        function validarEmail(email) {
            expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!expr.test(email))
                alert("Error: La dirección de correo " + email + " es incorrecta.");
        }
</script>-->