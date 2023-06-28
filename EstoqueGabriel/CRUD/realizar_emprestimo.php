
<!DOCTYPE html>
<html>

<head>
    <title>Realizar Emprestimo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
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

        .btn-info {
        --bs-btn-hover-color: #000;
        --bs-btn-hover-bg: #31d2f2;
        --bs-btn-hover-border-color: #25cff2;
        --bs-btn-focus-shadow-rgb: 11,172,204;
    }
        .btn:hover {
        color: var(--bs-btn-hover-color);
        background-color: var(--bs-btn-hover-bg);
        border-color: var(--bs-btn-hover-border-color);
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

        .btn-blue {
            background-color: #2377fc;
            color: black;
            margin-right: 5px;
            padding: 7px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-blue:hover {
            background-color: #166df7;
            color: black;
            text-decoration:none;
        }

    </style>

<body>
    <?php
    require("../conn.php");
    date_default_timezone_set('America/Sao_Paulo');
    if (isset($_GET['emprestimo'])) {
        $emprestimo = $_GET['emprestimo'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome_prod = $_POST['nome_prod'];
            $tipo_prod = $_POST['tipo_prod'];
            $categoria_prod = $_POST['categoria_prod'];
            $assinatura = $_POST['assinatura'];
            $emissor = $_POST['emissor'];
            $quantidade = $_POST['quantidade'];
            $hora_emp = $_POST['hora_emp'];
            $emprestado = $_POST['emprestado'];
            $unidade_prod = $_POST['unidade_prod'];
            $quantidade_prod = $_POST['quantidade_prod'];

            $atualizacao = $pdo->prepare("
                UPDATE produto 
                SET quantidade_prod = quantidade_prod - :quantidade 
                WHERE id_prod = :emprestimo
            ");
            $atualizacao->bindValue(':quantidade', $quantidade);
            $atualizacao->bindValue(':emprestimo', $emprestimo);
            $atualizacao->execute();

            $cad_emprestimo = $pdo->prepare("
                INSERT INTO emprestimo 
                (nome_prod, tipo_prod, categoria_prod, emissor, assinatura, hora_emprestimo, emprestado, quantidade, unidade_prod, quantidade_prod)
                VALUES 
                (:nome_prod, :tipo_prod, :categoria_prod, :emissor, :assinatura, :hora_emp, :emprestado, :quantidade, :unidade_prod, :quantidade_prod - :quantidade)
            ");

            $cad_emprestimo->execute(array(
                ':nome_prod' => $nome_prod,
                ':tipo_prod' => $tipo_prod,
                ':categoria_prod' => $categoria_prod,
                ':emissor' => $emissor,
                ':assinatura' => $assinatura,
                ':hora_emp' => $hora_emp,
                ':emprestado' => $emprestado,
                ':quantidade' => $quantidade,
                ':unidade_prod' => $unidade_prod,
                ':quantidade_prod' => $quantidade_prod
            ));

            echo "<div class='alert alert-success'>Empréstimo realizado com sucesso</div>";
        }

        $consulta = $pdo->prepare("SELECT * FROM produto WHERE id_prod = :emprestimo");
        $consulta->bindValue(':emprestimo', $emprestimo);
        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
    ?>
            <div class='mt-3'>
                <form method='POST'>
                    <div class='container text-center mt-5'>
                        <h1>Emprestar Produto</h1>
                        <div class='form-group row'>
                            <label for='nome_prod' class='col-sm-2 col-form-label'>Nome do Produto:</label>
                            <div class='col-sm-6'>
                                <input type='text' name='nome_prod' id='nome_prod' class='form-control' value='<?php echo $resultado['nome_prod']; ?>' readonly>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='tipo_prod' class='col-sm-2 col-form-label'>Tipo do Material:</label>
                            <div class='col-sm-6'>
                                <input type='text' name='tipo_prod' id='tipo_prod' class='form-control' value='<?php echo $resultado['tipo_prod']; ?>' readonly>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='categoria_prod' class='col-sm-2 col-form-label'>Categoria do Material:</label>
                            <div class='col-sm-6'>
                                <input type='text' name='categoria_prod' id='categoria_prod' class='form-control' value='<?php echo $resultado['categoria_prod']; ?>' readonly>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='emissor' class='col-sm-2 col-form-label'>Emissor:</label>
                            <div class='col-sm-6'>
                                <input type='text' name='emissor' id='emissor' class='form-control'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='assinatura' class='col-sm-2 col-form-label'>Assinatura:</label>
                            <div class='col-sm-6'>
                                <input type='text' name='assinatura' id='assinatura' class='form-control'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='quantidade' class='col-sm-2 col-form-label'>Quantidade a ser emprestada:</label>
                            <div class='col-sm-6'>
                                <input type='number' name='quantidade' min='1' max='<?php echo $resultado['quantidade_prod']; ?>' id='quantidade' class='form-control'>
                                <input type='hidden' name='quantidade_prod' id='quantidade_prod' class='form-control' value='<?php echo $resultado['quantidade_prod']; ?>' readonly>
                            </div>
                        </div>
                        <div class='form-group offset-md-2'>
                            <div class='col-md-3'>
                                <label for='unidade_prod'>Unidade de Medida do Material:</label>
                                <select name='unidade_prod' id='unidade_prod'>
                                    <option value='Unidade'>Unidade</option>
                                    <option value='Caixa'>Caixa</option>
                                    <option value='Pacote'>Pacote</option>
                                    <option value='Metros'>Metros</option>
                                    <option value='Litros'>Litros</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class='form-group row'>
                            <input type='hidden' name='hora_emp' id='hora_emp' value='<?php echo date('Y-m-d H:i:s'); ?>' class='form-control'>
                            <input type='hidden' name='emprestado' id='emprestado' value='Sim'>
                        </div>
                        <div>
                            <a href="../tabela.php" class="btn btn-info">Voltar</a>
                            <input type="submit" class="btn btn-green" value="Emprestar produto">
                        </div>
                        </div>
                    </div>
                </form>
            </div>
    <?php
        } else {
            echo "<div class='alert alert-danger'>Nenhum resultado encontrado para o empréstimo informado.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Parâmetro 'emprestimo' não fornecido.</div>";
    }
    ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>