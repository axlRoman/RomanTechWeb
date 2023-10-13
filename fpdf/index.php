<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('Logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Salto de línea
    $this->Ln(10);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(100,10,'Ticket de Compra - RomanTechMx',0,0,'C');
    // Salto de línea
    $this->Ln(25);

    $this->Cell(120,10,"Producto", 1, 0, 'C', 0);    
    $this->Cell(40,10,"Precio (MXN)", 1, 0, 'C', 0);
    $this->Cell(30,10,"Cantidad", 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página '.$this->PageNo()).'/{nb}',0,0,'C');
}
}

require 'cn.php';
$consulta = "SELECT * FROM detalle_compra";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc()){
    
    $pdf->Cell(120,10,$row['nombre'], 1, 0, 'C', 0);    
    $pdf->Cell(40,10,"$ ".$row['precio'], 1, 0, 'C', 0);
    $pdf->Cell(30,10,$row['cantidad'], 1, 1, 'C', 0);
}

$pdf->Output();
?>