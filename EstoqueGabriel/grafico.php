<?php
require("conn.php");

$minQuantityThreshold = 10;

$queryStock = "SELECT nome_prod, quantidade_prod FROM produto WHERE quantidade_prod < :threshold";
$stmtStock = $pdo->prepare($queryStock);
$stmtStock->bindParam(':threshold', $minQuantityThreshold, PDO::PARAM_INT);
$stmtStock->execute();
$productsStock = $stmtStock->fetchAll(PDO::FETCH_ASSOC);

$chartLabelsStock = array();
$chartDataStock = array();

foreach ($productsStock as $product) {
    $chartLabelsStock[] = $product['nome_prod'];
    $chartDataStock[] = $product['quantidade_prod'];
}

$queryLoan = "SELECT nome_prod, COUNT(*) AS quantidade_emprestada FROM emprestimo WHERE emprestado = 'Sim' GROUP BY nome_prod";
$stmtLoan = $pdo->prepare($queryLoan);
$stmtLoan->execute();
$productsLoan = $stmtLoan->fetchAll(PDO::FETCH_ASSOC);

$chartLabelsLoan = array();
$chartDataLoan = array();

foreach ($productsLoan as $product) {
    $chartLabelsLoan[] = $product['nome_prod'];
    $chartDataLoan[] = $product['quantidade_emprestada'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafico</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .btn-voltar {
            font-family: 'Poppins', sans-serif;
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .btn-voltar:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <a href="menu.php" class="btn-voltar" style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">VOLTAR </a>
    <canvas id="productChart"></canvas>

    <script>
    var labelsStock = <?php echo json_encode($chartLabelsStock); ?>;
    var dataStock = <?php echo json_encode($chartDataStock); ?>;
    var labelsLoan = <?php echo json_encode($chartLabelsLoan); ?>;
    var dataLoan = <?php echo json_encode($chartDataLoan); ?>;

    var ctx = document.getElementById('productChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labelsStock,
            datasets: [
                {
                    label: 'PRODUTOS NO ESTOQUE',
                    type: 'bar',
                    data: dataStock,
                    backgroundColor: '#f5ed02',
                },
                {
                    label: 'PRODUTOS EMPRESTADOS',
                    type: 'bar',
                    data: dataLoan,
                    backgroundColor: '#007BFF',
                }
            ]
        },
        options: {
            indexAxis: 'x',
            scales: {
                y: {
                    stacked: true
                }
            }
        }
    });
    </script>
</body>
</html>
