<?php
    //require("protected.php");
    require("conn.php");

    $pesquisa = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';

    if (!empty($pesquisa)) {
        $tabela = $pdo->prepare("SELECT * FROM produto WHERE problema_prod IS NOT NULL AND nome_prod LIKE :pesquisa");
        $tabela->bindValue(':pesquisa', '%' . $pesquisa . '%');
    } else {
        $tabela = $pdo->prepare("SELECT * FROM produto WHERE problema_prod IS NOT NULL");
    }

    $tabela->execute();
    $rowTabela = $tabela->fetchAll();

    if (empty($rowTabela)){
        echo "<script>
        alert('Tabela vazia!!!');
        </script>";
    }
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Tabela de Solicitacoes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
        body {
            background: url('img/correio.jpg');
			background-size: cover;
			font-family: Arial, sans-serif;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.7);
            border: 2px solid;
            margin: 56px auto;
            border-radius: 20px;
        }
        .table {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid;
            border-radius: 20px;
        }
      
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        </style>
    </head>
    <body>
        <div class="container">
        <br>
            <br>
            <a href="menu.php" class="btn btn-outline-dark">Menu</a>
            <a href="tabela.php" class="btn btn-primary">Todos os Produtos</a>
            <br>
            <h1 style="text-align:center;">Produtos com Defeito</h1>
            <br>
            <form method="GET" action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" style="margin-right: 10px" placeholder="Pesquisar produto" id="nome_pesquisa" name="pesquisar" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                        <a href="?" class="btn btn-secondary">Limpar</a>
                    </div>
                </div>
            </form>  
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID DO PRODUTO</th>
            <th scope="col">NOME DO PRODUTO</th>
            <th scope="col">TIPO DO PRODUTO</th>
            <th scope="col">CATEGORIA DO PRODUTO</th>
            <th scope="col">QUANTIDADE DO PRODUTO</th>
            <th scope="col">MEDIDA DO PRODUTO</th>
            <th scope="col">DEFEITO DO PRODUTO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($rowTabela as $linha){
                echo '<tr>';
                echo "<th scope='row'>".$linha['id_prod']."</th>";
                echo "<td>".$linha['nome_prod']."</td>";
                echo "<td>".$linha['tipo_prod']."</td>";
                echo "<td>".$linha['categoria_prod']."</td>";
                echo "<td>".$linha['quantidade_def']."</td>";
                echo "<td>".$linha['unidade_prod']."</td>";
                echo "<td>".$linha['problema_prod']."</td>";
                echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
