<?php
require('../conn.php');


if (isset($_GET['defeito'])) {
    $defeito = $_GET['defeito'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $problema_prod = $_POST['problema_prod'];
        $quantidade_def = $_POST['quantidade_def'];

        $atualizacao = $pdo->prepare("UPDATE produto SET problema_prod = :problema_prod, quantidade_def = :quantidade_def WHERE id_prod = :defeito");
        $atualizacao->bindValue(':problema_prod', $problema_prod);
        $atualizacao->bindValue(':defeito', $defeito);
        $atualizacao->bindValue(':quantidade_def', $quantidade_def);
        $atualizacao->execute();

        // Atualização da quantidade_prod
        $atualizacaoQuantidade = $pdo->prepare("UPDATE produto SET quantidade_prod = quantidade_prod - :quantidade_def WHERE id_prod = :defeito");
        $atualizacaoQuantidade->bindValue(':quantidade_def', $quantidade_def);
        $atualizacaoQuantidade->bindValue(':defeito', $defeito);
        $atualizacaoQuantidade->execute();

        echo "<div class='alert alert-success'>Problema registrado com sucesso.</div>";
    }

    $consulta = $pdo->prepare("SELECT * FROM produto WHERE id_prod = :defeito");
    $consulta->bindValue(':defeito', $defeito);
    $consulta->execute();

    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Registrar Defeito</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <style>
                body {
                    background: #BEBEBE;
                }

                .container {
                    margin-top: 50px;
                }

                .btn {
                    margin-right: 5px;
                    color: black;
                    margin-right: 20px;
                    padding: 7px 10px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    text-decoration: none;
                }

                .btn-green {
                    background-color: #02bf1f;
                    color: black;
                    margin-right: 5px;
                    padding: 7px 10px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    text-decoration: none;
                }

                .btn-green:hover {
                    background-color: #02d422;
                }
            </style>
        </head>

        <body>

            <div class='container text-center mt-5'>
                <h1>Registrar Defeitos</h1>
                <div class='mt-3'>
                    Nome do Item: <?php echo $resultado['nome_prod']; ?>
                </div>
                <div class='mt-3'>
                    Tipo do Item: <?php echo $resultado['tipo_prod']; ?>
                </div>
                <div class='mt-3'>
                    Categoria do Item: <?php echo $resultado['categoria_prod']; ?>
                    <br><br>
                </div>
                <div class='mt-3'>
                    <form method='POST'>
                        <div class='form-group row'>
                            <label for='quantidade_def' class='col-sm-6'>Quantidade:</label>
                            <br><br>
                            <div>
                                <input type='number' style='width: 400px; height: 30px; margin-left: -185px;' name='quantidade_def' id='quantidade_def' class='form-control' required max='<?php echo $resultado['quantidade_prod']; ?>'>
                            </div>
                            <label for='problema_prod' class='col-sm-6 col-form-label'>Defeito:</label>
                            <div class='col-sm-6'>
                                <input type='text' style='width: 400px; height: 40px; margin-left: -200px;' name='problema_prod' id='problema_prod' class='form-control' required>
                            </div>
                        </div>
                        <br>
                        <a href="../tabela.php" class="btn btn-info">Voltar</a>
                        <button type='submit' class='btn btn-green'>Salvar</button>

                    </form>
                </div>
            </div>
    <?php
    } else {
        echo "<div class='alert alert-danger'>Nenhum resultado encontrado para o defeito informado.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Parâmetro 'defeito' não fornecido.</div>";
}
    ?>

        </body>

        </html>