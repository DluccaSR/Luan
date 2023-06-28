<?php
require('../conn.php');

if (isset($_GET['chave'])) {
    $chave = $_GET['chave'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $limpar_pessoa_contato = $pdo->prepare("UPDATE chave SET pessoa = NULL, contato = NULL, disponivel = 'Sim' WHERE id_chave = :chave");
        $limpar_pessoa_contato->bindValue(':chave', $chave);
        $limpar_pessoa_contato->execute();

        echo "<script>
            alert('Devolução de chave realizada com sucesso!');
            window.location.href='../tabela_chaves_emprestadas.php';
        </script>";
    }

    $consulta = $pdo->prepare("SELECT * FROM chave WHERE id_chave = :chave");
    $consulta->bindValue(':chave', $chave);
    $consulta->execute();

    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
?>
        <div class="mt-3">
            <form method="POST">
                <div class="container text-center mt-5">
                    <h1>Devolução de Chave</h1>
                    <p>Chave: <?php echo $resultado['codigo']; ?></p>
                    <div class="form-group row">
                        <label for="pessoa" class="col-sm-2 col-form-label">Emprestar:</label>
                        <div class="col-sm-6">
                            <input type="text" name="pessoa" id="pessoa" class="form-control" value="<?php echo $resultado['pessoa']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contato" class="col-sm-2 col-form-label">Contato:</label>
                        <div class="col-sm-6">
                            <input type="text" name="contato" id="contato" class="form-control" value="<?php echo $resultado['contato']; ?>" readonly>
                        </div>
                    </div>
                    <input type="submit" value="Devolver" class="btn btn-primary">
                </div>
            </form>
        </div>
<?php
    } else {
        echo "<div class='alert alert-danger'>Nenhum resultado encontrado para a chave informada.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Parâmetro 'chave' não fornecido.</div>";
}
?>
