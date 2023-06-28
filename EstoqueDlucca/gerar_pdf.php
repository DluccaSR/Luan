<?php
include("conn2.php");

$sql = "SELECT * FROM emprestimo";

$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $html = "<table border='1'>";

    $html .= "<td>Nome do Produto</td>";
    $html .= "<td>Quantidade emprestada</td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";
    $html .= "<td></td>";

    while ($row = $res->fetch_object()) {
        $html .= "<tr>";
        $html .= "<td>" . $row->nome_produto. "</td>";
        $html .= "<td>" . $row->quantidade_prod . "</td>";
    //    $html .= "<td>" . $row->. "</td>";
    //   $html .= "<td>" . $row->. "</td>";
    //    $html .= "<td>" . $row->. "</td>";
    //    $html .= "<td>" . $row->. "</td>";
        $html .= "</tr>";
    }

    $html .= "</table>";
} else {
    $html = "Nada encontrado";
}

use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->set_option('defaultFont', 'sans');

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream();
?>