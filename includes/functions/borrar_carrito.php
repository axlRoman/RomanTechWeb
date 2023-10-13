<?php

    session_start();

    $key_val = $_POST['id_key'];
    $index_val = $_POST['index'];

    if(isset($_SESSION['carrito'])){
        $carrito = $_SESSION['carrito'];

        $key_delete = array_search($key_val , $carrito); // $key = 2;
    
        unset($carrito[$key_delete]);
        #array_diff($carrito, [$key_val]);

        echo $key_delete;

        $_SESSION['carrito'] = $carrito; 
    }

    #echo $key_val;
    #echo $index_val;

    #header('Location: ../../carrito.php');
?>