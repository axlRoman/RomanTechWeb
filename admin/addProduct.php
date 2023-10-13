<?php
require_once 'product.entidad.php';
require_once 'product.model.php';

//Logica
$prod = new Product();
$model = new ProductModel();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'agregar':
            $prod->__SET('Nombre',          $_REQUEST['Nombre']);
            $prod->__SET('Descripcion',     $_REQUEST['Descripcion']);
            
            $prod->__SET('Precio',          $_REQUEST['Precio']);
            $prod->__SET('Inventario',      $_REQUEST['Inventario']);

            $model->Agregar($prod);
            header('Location: addProduct.php');
            break;
        case 'actualizar':
            $prod->__SET('SKU',             $_REQUEST['SKU']);
            $prod->__SET('Nombre',          $_REQUEST['Nombre']);
            $prod->__SET('Descripcion',     $_REQUEST['Descripcion']);
            
            $prod->__SET('Precio',          $_REQUEST['Precio']);
            $prod->__SET('Inventario',      $_REQUEST['Inventario']);

            $model->Actualizar($prod);
            header('Location: addProduct.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['SKU']);
            header('Location: addProduct.php');
            break;

        case 'editar':
            $prod = $model->Obtener($_REQUEST['SKU']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imgs/Logo RomanTech.png">
    <title>Administrador RomanTechMx</title>
    <link rel="stylesheet" type="text/css" href="../css/style-admin.css ">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
</head>

<body>
    
    <header>
        <div id="header-crud">
            <h1>
                Administracion de RomanTechMx
            </h1>
        </div>
    </header>

    <div class="form-products">
        <div class="pure-u-1-12">

            <form action="?action=<?php echo $prod->SKU > 0 ? 'actualizar' : 'agregar'; ?>" method="POST" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                <input type="hidden" class="inputs" name="SKU" value="<?php echo $prod->__GET('SKU'); ?>" />
                <table class="products-table">
                    <tr>
                        <th style="text-align:left;">Nombre del producto</th>
                        <td><input type="text" class="inputs" name="Nombre" value="<?php echo $prod->__GET('Nombre'); ?>" /></td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Descripcion</th>
                        <td>                            
                            <textarea class="inputs" name="Descripcion">
                                <?php echo $prod->__GET('Descripcion'); ?>
                            </textarea>
                           
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Precio</th>
                        <td><input type="text" class="inputs" name="Precio" value="<?php echo $prod->__GET('Precio'); ?>" /></td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Cantidad</th>
                        <td><input type="text" class="inputs" name="Inventario" value="<?php echo $prod->__GET('Inventario'); ?>" /></td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="boton-save">Guardar</button>
                        </td>
                    </tr>
                </table>
            </form>

            <div class="products-view">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Caracteristicas</th>
                            <th>Precio</th>
                            <th>Inventario</th>
                            <th>Modificar Productos</th>
                            
                        </tr>
                    </thead>
                    <?php foreach ($model->Listar() as $r) : ?>
                        <tr>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('Descripcion'); ?></td>
                            <td><?php echo $r->__GET('Caracteristicas'); ?></td>
                            <td><?php echo $r->__GET('Precio'); ?></td>
                            <td><?php echo $r->__GET('Inventario'); ?></td>
                            <td class="botones">
                                <a href="?action=editar&SKU=<?php echo $r->SKU; ?>" class="boton-edit">Editar</a>
                                <a href="?action=eliminar&SKU=<?php echo $r->SKU; ?>" class="boton-delete">Eliminar</a>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>

    <footer>
        <span>© 2022, RomanTech.com</span>
    </footer>

</body>

</html>