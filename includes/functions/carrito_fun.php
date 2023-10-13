<?php
    if(isset($_POST['carrito_type'])){
        if ($_POST['carrito_type'] == 'add') {
            session_start();
    
            if(isset($_SESSION['carrito'])){
                $carrito = $_SESSION['carrito'];
            }else{
                $carrito = array();
            }
            $sku = $_POST['sku_product'];
            try {
                $contenido = count($carrito);

                array_push($carrito, $sku);
                
                if($contenido < count($carrito)){
                    $_SESSION['carrito'] = $carrito;
                    header("Location: ../../carrito.php");
                    /*
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'elemento_agregado' => $sku
                    );*/
                    
                }else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }

                
            } catch (\Exception $e) {
                $respuesta = array('respuesta' => $e->getMessage());
            }
            
        }

        if($_POST['carrito_type'] == 'borrar'){

            session_start();
            $key_val = $_POST['id_key'];
            $index_val = $_POST['index'];
            try {
                if(isset($_SESSION['carrito'])){
                    $carrito = $_SESSION['carrito'];
    
                    $contenido = count($carrito);
    
                    $key_delete = array_search($key_val , $carrito); // $key = 2;
                
                    unset($carrito[$key_delete]);
                    #array_diff($carrito, [$key_val]);
                    #echo $key_delete;
                }
    
                if(($contenido > count($carrito)) ){
                    $_SESSION['carrito'] = $carrito;

                    $contenido = count($carrito);
                    
                    header("Location: ../../carrito.php");
                    /*
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'id_eliminado' => $index_val,
                        'elemento_eliminado' => $key_delete,
                        'cantidad_productos' => $contenido
                    );*/
                }else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }    
            } catch (\Exception $e) {
                $respuesta = array('respuesta' => $e->getMessage());
            }
        }
    }
    


?>