<?php
require("../conn.php");
date_default_timezone_set('America/Sao_Paulo');
if (isset($_GET['devolver'])) {
    $emprestimo = $_GET['devolver'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $quantidade = $_POST['quantidade'];
        $quantidade_prod = $_POST['quantidade_prod'];

        $atualizacao = $pdo->prepare("UPDATE produto SET quantidade_prod = quantidade_prod + :quantidade WHERE id_prod = :emprestimo");
        $atualizacao->bindValue(':quantidade', $quantidade);
        $atualizacao->bindValue(':emprestimo', $emprestimo);
        $atualizacao->execute();

        // Redirecionar para a página de origem
        header("Location: tabela_emprestimos.php");
        exit;
    } else {
        $consulta = $pdo->prepare("SELECT * FROM produto WHERE id_prod = :emprestimo");
        $consulta->bindValue(':emprestimo', $emprestimo);
        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $quantidade = $resultado['quantidade'];
            $quantidade_prod = $resultado['quantidade_prod'];
            $quantidade_final = $quantidade + $quantidade_prod;

            $atualizacao = $pdo->prepare("UPDATE produto SET quantidade_prod = :quantidade_final WHERE id_prod = :emprestimo");
            $atualizacao->bindValue(':quantidade_final', $quantidade_final);
            $atualizacao->bindValue(':emprestimo', $emprestimo);
            $atualizacao->execute();

            // Redirecionar para a página de origem
            header("Location: ../tabela_emprestimos.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Nenhum resultado encontrado para a devolução solicitada.</div>";
        }
    }
} else {
    echo "<div class='alert alert-danger'>Parâmetro 'chave' não fornecido.</div>";
}
?>
