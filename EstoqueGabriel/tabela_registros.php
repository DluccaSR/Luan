<?php
require("conn.php");

if (isset($_POST['pesquisar'])) {
    $nome = $_POST['nome_pesquisa'];
    $tabela = $pdo->prepare("SELECT id_emprestimo, nome_emprestimo, quantidade_emprestimo, solicitante_emprestimo, emailSolicitante_emprestimo, telefoneSolicitante_emprestimo, dataEHoraRetirada_emprestimo, dataEHoraDevolucao_emprestimo FROM tb_emprestimos WHERE nome_emprestimo LIKE :nome");
    $tabela->bindValue(':nome', "%$nome%", PDO::PARAM_STR);
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
} else {
    $tabela = $pdo->prepare("SELECT * FROM tb_emprestimos");
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabela</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->    
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->    
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->    
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<style>
    body{
        background-color: #F8F8FF;
    }
    .container {
			background-color: #ffffff;
			padding: 30px;
			margin: 150px auto;
			width: 1200px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

  h1{
    font-family: 'Poppins', sans-serif;

  }
  </style>
    
    <div class="limiter">
    <div class="container">
        <h1>Tabela de Relatórios</h1>
        <br><br>
        <div class="">

            <table class="table table-striped">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nome_pesquisa" class="form-label">Pesquisar por Nome do Produto</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nome_pesquisa" name="nome_pesquisa" required>
                        <button class="btn btn-primary" type="submit" name="pesquisar">Pesquisar</button>
                        <br><br>
                        <a href="tabelaRelatorio.php" class="btn btn-secondary">Limpar Pesquisas</a>
                    </div>
                </div>
            </form>
            <thead>
                <tr>
                    <th scope="col">NOME</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">SOLICITANTE</th>
                    <th scope="col">EMAIL SOLICITANTE</th>
                    <th scope="col">TELEFONE SOLICITANTE</th>
                    <th scope="col">DATA RETIRADA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rowTabela as $linha) {
                    echo "<tr>";
                    echo "<td>".$linha['nome_emprestimo']."</td>";
                    echo "<td>".$linha['quantidade_emprestimo']."</td>";
                    echo "<td>".$linha['solicitante_emprestimo']."</td>";
                    echo "<td>".$linha['emailSolicitante_emprestimo']."</td>";
                    echo "<td>".$linha['telefoneSolicitante_emprestimo']."</td>";
                    echo "<td>".$linha['dataEHoraRetirada_emprestimo']."</td>";
                    echo "</tr>";
                }
                
                if (count($rowTabela) === 0) {
                    echo "<tr><td colspan='7'>Nenhum produto encontrado.</td></tr>";
                }
                ?>
            </tbody>
            </table>        
            <div class="container-login100-form-btn">
            <a href="paginaPrincipal.php" class="btn btn-primary">VOLTAR</a>
            </div>
            <br>
            <div class="container-login100-form-btn">
            <a href="gerar_relatorio.php" class="btn btn-primary">GERAR RELATÓRIO</a>
            </div>    

            <div class="container-login100-form-btn">
            </div>

        </div>
    </div>
    </div>
</body>
</html>
