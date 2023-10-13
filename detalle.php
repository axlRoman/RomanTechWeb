<?php require_once('includes/templates/header.php'); ?>

<?php $sku_product = $_GET['SKU']; ?>

<?php
require_once('config/config.php');
require_once('config/database.php');

$db = new Database();
$con = $db->conectar();

$sku = isset($_GET['SKU']) ? $_GET['SKU'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

$token_tmp = hash_hmac('sha1', $sku, KEY_TOKEN);
if ($token == $token_tmp) {
    $sql = $con->prepare("SELECT COUNT(SKU) FROM productos WHERE SKU=? ");
    $sql->execute([$sku]);
    if ($sql->fetchColumn() > 0) {
        $sql = $con->prepare("SELECT SKU, Nombre, Descripcion, Precio, Inventario FROM productos WHERE SKU=?");
        $sql->execute([$sku]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $nombre = $row['Nombre'];
        $descripcion = $row['Descripcion'];

        $precio = $row['Precio'];
        $inventario = $row['Inventario'];
    }
}
?>

<div class="producto">
    <div class="contenedor clearfix">

        <!--<php foreach($xmlDoc as $articulo) {  

        if($xmlDoc->producto[$i]->sku == $sku_product){
            #echo "Articulo en la lisa";
            ?> -->
        <form action="includes/functions/carrito_fun.php" method="POST" name="agregar-carrito" id="agregar-carrito">
            <div class="producto-content">
                <div class="producto-imagen">
                    <?php $imagen = "imgs/productos/" . $sku . "/principal.jpg"; ?>
                    <img src="<?php echo $imagen ?>" alt="">
                </div>
                <div class="producto-mas">
                    <div class="producto-nombre">
                        <p>
                            <?php echo $nombre; ?>
                        </p>
                    </div>
                    <div class="producto-precio">

                        <?php echo MONEDA .  number_format($row['Precio'], 2, '.', ','); ?>
                    </div>
                    <div class="producto-datos">
                        <div class="pago">
                            <p>
                                <i class="far fa-credit-card"></i>
                                &nbsp;12 meses de <?php echo MONEDA .  number_format(($row['Precio'] / 12) + 133, 2, '.', ','); ?><br>
                                <img src="imgs/pagos.jpg" alt="metodos de pago">
                            </p>
                        </div>
                        <div class="envio">
                            <p>
                                <i class="fas fa-truck"></i>&nbsp;Envío gratis a todo el pa&iacute;s
                                <br>
                                <span>Conoce los tiempos y las formas de env&iacute;o</span>
                            </p>
                        </div>
                        <br>
                        <div class="cantidad">
                            <label for="cantidad_producto">Cantidad:</label>
                            <input type="number" name="cantidad_producto" id="cantidad_producto" max="<?php echo $inventario ?>" min="1" value="1">
                            <span>(<?php if ($inventario == 1) {
                                        echo "Ultima Disponible";
                                    } else {
                                        echo $inventario;
                                        echo "  Disponibles";
                                    } ?>)
                            </span>
                        </div>
                        <br>
                        <div class="botones">
                            
                            <input type="hidden" name="sku_product" value="<?php echo $row['SKU'] ?>">
                            <input type="hidden" name="carrito_type" value="add">
                            <!--<button type="submit" name="btnAnadir" id="btnAnadir" class="button transparente"><i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito</button>-->
                            <button type="submit" class="button"><i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="producto-informacion">
                    <nav>
                        <a href="#descripcion">Descripci&oacute;n</a>
                        <a href="#caracteristicas">Caracter&iacute;sticas</a>
                    </nav>
                    <div class="informacion clearfix">
                        <div class="" id="descripcion">
                            <p>
                                <?php echo $descripcion; ?>
                            </p>
                        </div>
                        <div class="" id="caracteristicas">
                            <p>
                                <!--    <php echo $xmlDoc->producto[$i]->caracteristicas; ?>-->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--<php
        }
        $i++;
    } ?> -->
    </div>
</div>

<?php require_once('includes/templates/footer.php'); ?>