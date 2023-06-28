<?php
    //require("protected.php");
    require("conn.php");

    $tabela = $pdo->prepare("SELECT * FROM produto WHERE emprestado = 'Não' AND tipo_prod = 'Empréstimo'");
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
        <link rel="stylesheet" href="css/tabelas.css">
    </head>
    <body>
        <div class="container">
        <br>
        <a href="tabela.php" class="btn btn-info">VOLTAR</a>
        <a href="registrar_entrada.php" class="btn btn-green">CADASTRAR MATERIAL</a>
        <br>
        <h1 style="text-align:center;">Empréstimo de Produtos</h1>
        <br>  
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID DO PRODUTO</th>
            <th scope="col">NOME DO PRODUTO</th>
            <th scope="col">CATEGORIA DO PRODUTO</th>
            <th scope="col">QUANTIDADE DO PRODUTO</th>
            <th scope="col">UNIDADE DO PRODUTO</th>
            <th scope="col">DATA DE ENTRADA</th>
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
                echo "<td>".$linha['quantidade_prod']."</td>";
                echo "<td>".$linha['unidade_prod']."</td>";
                echo "<td>".$linha['entrada_prod']."</td>";
                echo '<td><a href=CRUD\realizar_emprestimo.php?emprestimo='.$linha['id_prod'].' class="btn btn-primary">REALIZAR EMPRESTIMO</a></td>';
                echo '<td><a href=CRUD\registrar_defeito.php?defeito='.$linha['id_prod'].' class="btn btn-danger">REGISTRAR DEFEITO</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        <a href="tabela_recentes.php" class="btn btn-secondary">Exibir Recentes</a>
        <a href="tabela_defeito.php" class="btn btn-outline-dark">Registo de Defeitos</a>
        <br><br>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
</script>
