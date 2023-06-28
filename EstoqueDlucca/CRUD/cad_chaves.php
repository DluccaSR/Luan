<?php
include('../conn.php');

$sala = $_POST['sala'];
$disponivel = $_POST['disponivel'];
$codigo = rand(10000, 99999);

if (empty($sala)) {
    echo "<script>
        alert('Você precisa preencher os campos!');
        window.location.href='../tabela_chaves.php';
    </script>";
} else {
    $cad_chaves = $pdo->prepare("INSERT INTO chave (codigo, sala, disponivel) VALUES (:codigo, :sala, :disponivel)");
    $cad_chaves->execute(array(
        ':codigo' => $codigo,
        ':sala' => $sala,
        ':disponivel' => $disponivel
    ));

    echo "<script>
        alert('Chave cadastrada com sucesso!');
        window.location.href='../tabela_chaves.php';
    </script>";
}
