<?php

    $linkXML = 'includes/files/catalogo.xml';

    $response = file_get_contents($linkXML);
    $xmlDoc = new \SimpleXMLElement($response);

    /*
    echo $xmlDoc->producto[1]->imagen;
    echo "<br>";
    echo $xmlDoc->producto[1]->nombre;
    echo "<br>";
    echo $xmlDoc->producto[1]->sku;
    echo "<br>";
    echo $xmlDoc->producto[1]->descripcion;
    echo "<br>";
    echo $xmlDoc->producto[1]->caracteristicas;
    echo "<br>";
    echo $xmlDoc->producto[1]->precio;
    echo "<br>";
    echo $xmlDoc->producto[1]->dcto;
    echo "<br>";
    */

?>