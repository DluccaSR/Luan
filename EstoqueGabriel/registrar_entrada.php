<?php
require("conn.php");

$tabela = $pdo->prepare("SELECT id, login, senha 
    FROM usuario;");
$tabela->execute();
$rowTabela = $tabela->fetchAll();


?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Cadastro de Solicitacoes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background: #BEBEBE;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            display: flex;
            justify-content: center;
        }

        .form-group .col-md-6 {
            width: 100%;
            max-width: 400px;
        }

        .form-control {
            width: 100%;
        }

        .btn {
            margin-top: 10px;
            margin-right: 20px;
        }

        .float-end {
            float: right;
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
        float: right;
        }

        .btn-green:hover {
            background-color: #02d422;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Entrada de Produto</h1>
        <br>
        <form action="" method="post" id="formulario">
            <div class="form-group">
                <div class="col-md-6">
                    <label for="">Nome do Produto:</label>
                    <input type="text" name="nome_prod" id="" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6">
                    <label for="status">Tipo do Produto:</label>
                    <select name="tipo_prod" id="status">
                        <option value="">Tipo do Material</option>
                        <option value="Empréstimo">Empréstimo</option>
                        <option value="Uso Único">Uso Único</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6">
                    <label for="">Categoria do Produto:</label>
                    <input type="text" name="categoria_prod" id="" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6">
                    <label for="">Quantidade do Produto:</label>
                    <input type="number" name="quantidade_prod" min='1' max="10000000000" id="" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6">
                    <label for="unidade_prod">Tipo do Produto:</label>
                    <select name="unidade_prod" id="unidade_prod">
                        <option value="Unidade">Unidade</option>
                        <option value="Caixa">Caixa</option>
                        <option value="Pacote">Pacote</option>
                        <option value="Metros">Metros</option>
                        <option value="Litros">Litros</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6">
                    <input type="hidden" name="entrada_prod" value="<?php echo date('Y-m-d H:i:s'); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <input type="hidden" name="emprestado" value="Não">
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6">
                    <a href="tabela.php" class="btn btn-info">Voltar</a>
                    <input type="submit" class="btn btn-green" value="Cadastrar produto">
                </div>
            </div>
        </form>
        <div id="resultado"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        $("#formulario").submit(function() {
            event.preventDefault();
            var dados = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'CRUD/cad_prod.php',
                data: dados,
                success: function(data) {
                    $("#resultado").html(data);
                }
            });
        });
    </script>
</body>
</html>