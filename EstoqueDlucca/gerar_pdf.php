<?php
include("conn2.php");

$query = "SELECT * FROM emprestimo";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $html = "<table border='1'>";
    $html .= "<thead>";
    $html .= "<tr>";
    $html .= "<th>Nome do Produto</th>";
    $html .= "<th>Quantidade emprestada</th>";
    $html .= "</tr>";
    $html .= "</thead>";
    $html .= "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        $html .= "<tr>";
        $html .= "<td>".$row['nome_prod']."</td>";
        $html .= "<td>".$row['quantidade_prod']."</td>";
        $html .= "</tr>";
    }

    $html .= "</tbody>";
    $html .= "</table>";

    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("relatorio_emprestimo.pdf", array("Attachment" => false));
    exit();
} else {
    echo "<p>Nenhum empréstimo encontrado.</p>";
}

?>
