<!--<php
require_once '../../detalle-compra/detalle-compra.entidad.php';
require_once '../../detalle-compra/detalle-compra.model.php';

//Logica
$prod = new DetalleCompra();
$model = new DetalleCompraModel();
?>
-->
<?php
            require_once('../../config/config.php');
            require_once('../../config/database.php');
            $db = new Database();
            $con = $db->conectar();

            $sql = $con->prepare("SELECT SKU, Nombre, Precio FROM productos");
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

            $json = file_get_contents('php://input');
            $datos = json_decode($json, true);

            echo '<pre>';
            print_r($datos);
            echo '</pre>';

            if (is_array($datos)) {
                $id_transaccion = $datos['detalles']['id'];
                $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
                $status = $datos['detalles']['status'];
                $fecha = $datos['detalles']['update_time'];
                $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
                $email = $datos['detalles']['payer']['email_address'];
                $id_cliente = $datos['detalles']['payer']['payer_id'];

                $sql = $con->prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total) VALUES (?,?,?,?,?,?)");
                $sql->execute([$id_transaccion, $fecha_nueva, $status, $email, $id_cliente, $total]);
                $id = $con->lastInsertId();

               // echo $id;
/*
                if ($id > 0) {
                    
                    if (in_array($sku, $carrito)) {
                        $occurences = array_count_values($carrito);
                        $sql = $con->prepare("SELECT SKU, Nombre, Precio, Inventario FROM productos WHERE SKU=?");
                        $sql->execute($sku);
                        $row_prod = $sql->fetchAll(PDO::FETCH_ASSOC);

                        $precio = $row_prod['Precio'];
                        $iva = 0.16;
                        $total = $precio + $precio * $iva;



                        $prod->__SET('id_compra',       $id);
                        $prod->__SET('id_producto',     $sku);
                        $prod->__SET('nombre',          $row_prod['Nombre']);
                        $prod->__SET('precio',          $total);
                        $prod->__SET('cantidad',        $cantidad);

                        $model->Agregar($prod);
                    }
                }*/

                //$productos = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : null;

                /*
        if ($productos != null) {
            foreach ($productos as $clave => $cantidad) {
                $sql = $con->prepare("SELECT SKU, Nombre, Precio, Inventario FROM productos WHERE SKU=?");
                $sql->execute($clave);
                $row_prod = $sql->fetchAll(PDO::FETCH_ASSOC);

                $precio = $row_prod['Precio'];
                $iva = 0.16;
                $total = $precio + $precio * $iva;

                $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUES (?,?,?,?,?)");
                $sql_insert->execute([$id, $clave, $row_prod['Nombre'], $total, $cantidad]);
            }
        }*/
            }
    
?>
