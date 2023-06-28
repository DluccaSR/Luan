<?php

    require('../conn.php');

    $id_chave = $_POST['id_chave'];
    $sala = $_POST['sala'];
    $pessoa = $_pessoa['pessoa']; 
    $disponivel_chave = $_POST['disponivel_chave'];
    $desaparecida = $_POST['desaparecida'];

    if(empty($id_chave) || empty($sala) || empty($disponivel_chave) || empty($desaparecida)){
        echo "Os valores não podem ser vazios";
    }else{
        $update_chaves = $pdo->prepare("UPDATE chave SET sala = :sala, pessoa = :pessoa disponivel_chave = :disponivel_chave, desaparecida = :desaparecida WHERE id_chave = :id_chave;");

    $update_chaves->execute(array(
        ':id_chave' => $id_chave,
        ':sala'=> $sala,
        ':pessoa'=>$pessoa,
        ':disponivel_chave'=> $disponivel_chave,
        ':desaparecida'=> $desaparecida,
    ));

    echo "<script>
    alert('Chave Editada com sucesso!');
    window.location.href='../tabela_chaves.php';
    </script>";
    }
?>