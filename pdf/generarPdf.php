<?php
require "../fpdf186/fpdf.php";

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Detalles del Pedido', 0, 1, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPedido = $_POST['idPedido'];
    $infoHTML = $_POST['infoHTML'];

    // Obtén información adicional de las líneas de pedido
    $infoHTMLLineas = array();
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'infoHTMLLinea') !== false) {
            $infoHTMLLineas[] = $_POST[$key];
        }
    }

    $pdf = new PDF();
    $pdf->AddPage();

    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0);

    // Agregar información del pedido sin etiquetas HTML
    $infoTextoPlano = strip_tags(html_entity_decode($infoHTML, ENT_QUOTES, 'UTF-8'));
    $lineas = explode("\n", $infoTextoPlano);

    foreach ($lineas as $linea) {
        $pdf->MultiCell(0, 10, $linea);
    }

    // Agregar información de las líneas de pedido sin etiquetas HTML
    foreach ($infoHTMLLineas as $infoHTMLLinea) {
        $infoTextoPlanoLinea = strip_tags(html_entity_decode($infoHTMLLinea, ENT_QUOTES, 'UTF-8'));
        $lineasLinea = explode("\n", $infoTextoPlanoLinea);

        foreach ($lineasLinea as $lineaLinea) {
            $pdf->MultiCell(0, 10, $lineaLinea);
        }
    }

    $pdf->Output();
}
