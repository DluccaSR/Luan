<?php
    require('../conn.php');

    if (isset($_GET['devolver'])) {
        $devolver = $_GET['devolver'];

        $del_prod = $pdo->prepare('DELETE FROM emprestimo WHERE id_prod=:devolver');
        $del_prod->execute(array(':devolver' => $devolver));

        echo "<script>
                alert('Material Devolvido com sucesso!');
                window.location.href='../tabela_emprestimos.php';
              </script>";
        exit;
    } else {
        header("Location: ../index.php");
        exit;
    }
?>
