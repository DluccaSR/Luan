<?php
    require('../conn.php');

    if (isset($_GET['chave'])) {
        $chave = $_GET['chave'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pessoa = $_POST['pessoa'];
            $contato = $_POST['contato'];

            $atualizacao = $pdo->prepare("
                UPDATE chave 
                SET pessoa = :pessoa, contato = :contato, disponivel = 'Não' 
                WHERE id_chave = :chave
            ");
            $atualizacao->bindValue(':pessoa', $pessoa);
            $atualizacao->bindValue(':contato', $contato);
            $atualizacao->bindValue(':chave', $chave);
            $atualizacao->execute();

            echo "<script>
                alert('Empréstimo de chave realizado com sucesso!');
                window.location.href='../tabela_chaves_emprestadas.php';
            </script>";
        }

        $consulta = $pdo->prepare("SELECT * FROM chave WHERE id_chave = :chave");
        $consulta->bindValue(':chave', $chave);
        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
?>
            <div class='mt-3'>
                <form method='POST'>
                    <div class='container text-center mt-5'>
                        <h1>Emprestar Chave</h1>
                        <div class='form-group row'>
                            <label for='pessoa' class='col-sm-2 col-form-label'>Nome da Pessoa:</label>
                            <div class='col-sm-6'>
                                <input type='text' name='pessoa' id='pessoa' class='form-control' required>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for='contato' class='col-sm-2 col-form-label'>Contato:</label>
                            <div class='col-sm-6'>
                                <input type='text' max='11' name='contato' id='contato' class='form-control' required>
                            </div>
                        </div>
                        <input type='submit' value='Emprestar' class='btn btn-primary'>
                    </div>
                </form>
            </div>
<?php
        } else {
            echo "<div class='alert alert-danger'>Nenhum resultado encontrado para o empréstimo informado.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Parâmetro 'chave' não fornecido.</div>";
    }
?>
