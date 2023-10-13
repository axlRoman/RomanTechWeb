<!doctype html>
<html class="no-js" lang="es">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">    
    <meta name="google-site-verification" content="TGRR0SJpJhI1Wro8q4znuqRTmhds9hj1kLwZW2OxYwc" />
    <meta http-equiv = "Content-type" content = "text / html; charset = utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="En RomanTechMx nos dedicamos a ofrecerle los mejores productos y servicios de calidad, como lo son equipos de cómputo pre-ensamblados, equipos personalizados, venta de hardware, mantenimiento y reparación del equipo de cómputo. ">
    <meta name="keywords" content="Computo, Laguna, Computadores, Computadoras, Tecnologia, Tienda, Mantenimiento, Servicios, Personalizados, Tecno, Systems, R.A.S, Tecno Systems R.A.S" >

    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" type="image/png"  sizes="32x32" href="imgs/Logo RomanTech.png">

    <link rel="manifest" href="manifest.json">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="RomanTechMx">
    <meta name="apple-mobile-web-app-title" content="RomanTechMx">
    <meta name="theme-color" content="#000000">
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-120x120-precomposed.png" /> 
    <link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon-152x152-precomposed.png" />

    <script src="https://kit.fontawesome.com/24d0778069.js" crossorigin="anonymous"></script>
    
    <!-- Place favicon.ico in the root directory -->

    <?php
        $archivo = basename($_SERVER["PHP_SELF"]);
        $pagina = str_replace(".php","",$archivo);
        $pagina = ucfirst($pagina);
        $archivo_base = $archivo;

        switch($pagina){
            case "Index": echo "<title>Inicio | RomanTechMX</title>";break;
            case "Catalogo": echo "<title>Catálogo | RomanTechMX</title>";break;
            default: echo "<title>$pagina | RomanTechMX</title>";break;
        }

        session_start();

        if(isset($_SESSION['carrito'])){
            $carrito = $_SESSION['carrito'];
        }else{
            $carrito = array();
        }

    ?>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet"> 
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="css/colorbox.css">
    
</head>

<body class="<?php echo $pagina ?>">
        <header class="site-header">
            <div class="content-header clearfix">
                <div class="logo"><a href="index.php"><img src="imgs\RomanTech logo.png" alt="Logotipo"></a></div>
                <div class="search-cart-menu clearfix">
                    
                    
                </div>
                <nav class="navegador-principal clearfix" id="navegador-principal">
                    <ul>
                        <li><a href="index.php"><i class="fas fa-home"></i>&nbsp;Inicio</a></li>
                        <li><a href="productos.php"><i class="fas fa-book-open"></i>&nbsp;Cat&aacute;logo</a></li>
                        <li><a href="nosotros.php"><i class="fas fa-users"></i>&nbsp;Nosotros</a></li>
                        <li><a href="contacto.php"><i class="fas fa-user"></i>&nbsp;Contacto</a></li>
                        
                    </ul>
                </nav>
            </div>
        </header>
        <header class="site-header-movil">
            <div class="content-header-movil clearfix">
                <div class="menu-movil">
                    <i class="fas fa"></i>
                </div>
                <div class="logo-movil upper">
                    <a href="index.php"><img src="imgs/logo-letras.png" alt=""></a>
                </div>
                <div class="cart-movil">
                        <div class="content-cart-movil flex">
                            <a href="carrito.php"><i class="fas fa-shopping-cart"></i><span class="items-quantity"><?php echo count($carrito); ?></span></a>
                        </div>
                    </div>
                <nav class="navegador-movil clearfix" id="navegador-movil">
                    <ul>
                        <li>
                            <div class="buscador-movil clearfix">
                                <div class="content-buscador-movil flex">
                                    <input type="text" class="" placeholder="BUSCAR">
                                    <a href="#" class="field"><i class="fas fa-search"></i></a>
                                </div>
                            </div>
                        </li>
                        <li><a href="index.php"><i class="fas fa-home"></i>&nbsp;Inicio</a></li>
                        <li><a href="catalogo.php"><i class="fas fa-book-open"></i>&nbsp;Cat&aacute;logo</a></li>
                        <li><a href="nosotros.php"><i class="fas fa-users"></i>&nbsp;Nosotros</a></li>
                        <li><a href="contacto.php"><i class="fas fa-user"></i>&nbsp;Contacto</a></li>
                        <li><a href="login.php"><i class="fas fa-user"></i>&nbsp;Iniciar Sesi&oacute;n</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        
    