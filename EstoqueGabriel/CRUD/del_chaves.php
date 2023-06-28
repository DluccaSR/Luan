<?php
    require('../conn.php');

    if (isset($_GET['id_chave'])) {
        $chave = $_GET['id_chave'];

        $del_chaves = $pdo->prepare('DELETE FROM chave WHERE id_chave = :id_chave');
        $del_chaves->execute(array(':id_chave' => $chave));

        header("Location: ../tabela_chaves.php");
        exit;
    } else {
        header("Location: ../tabela_chaves.php");
        exit;
    }
?>
