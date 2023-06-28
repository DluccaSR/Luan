<?php
require('../conn.php');

$nome_prod = $_POST['nome_prod'];
$tipo_prod = $_POST['tipo_prod'];
$categoria_prod = $_POST['categoria_prod'];
$quantidade_prod = $_POST['quantidade_prod'];
$unidade_prod = $_POST['unidade_prod'];
$entrada_prod = $_POST['entrada_prod'];
$emprestado = $_POST['emprestado'];

if (empty($nome_prod) || empty($tipo_prod)) {
    echo "Os valores não podem ser vazios";
} else {
    // Verificar se o nome_prod já existe
    $verifica_nome = $pdo->prepare("SELECT * FROM produto WHERE nome_prod = :nome_prod");
    $verifica_nome->bindValue(':nome_prod', $nome_prod);
    $verifica_nome->execute();
    $registro_existente = $verifica_nome->fetch(PDO::FETCH_ASSOC);

    if ($registro_existente) {
        // Nome_prod já existe, atualizar a quantidade
        $quantidade_existente = $registro_existente['quantidade_prod'];
        $nova_quantidade = $quantidade_existente + $quantidade_prod;

        $atualiza_quantidade = $pdo->prepare("UPDATE produto SET quantidade_prod = :nova_quantidade WHERE nome_prod = :nome_prod");
        $atualiza_quantidade->bindValue(':nova_quantidade', $nova_quantidade);
        $atualiza_quantidade->bindValue(':nome_prod', $nome_prod);
        $atualiza_quantidade->execute();

        echo "<script>alert('Produto atualizado com sucesso!');</script>";
    } else {
        // Nome_prod não existe, prosseguir com a inserção dos dados
        $cad_prod = $pdo->prepare("INSERT INTO produto (nome_prod, tipo_prod, categoria_prod, quantidade_prod, unidade_prod, emprestado, entrada_prod) 
            VALUES (:nome_prod, :tipo_prod, :categoria_prod, :quantidade_prod, :unidade_prod, :emprestado, :entrada_prod)");
        $cad_prod->execute(array(
            ':nome_prod' => $nome_prod,
            ':tipo_prod' => $tipo_prod,
            ':categoria_prod' => $categoria_prod,
            ':quantidade_prod' => $quantidade_prod,
            ':unidade_prod' => $unidade_prod,
            ':emprestado' => $emprestado,
            ':entrada_prod' => $entrada_prod
        ));

        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Cadastrado!',
            text: 'O produtoㅤ".$nome_prod . "ㅤfoi cadastrado',
            confirmButtonText: 'OK',
            onClose: function() {
                window.location.href = '../tabela.php';
            }
        }).then(function() {
            window.location.href = '../tabela.php';
        });
        </script>";;
    }
}
?>
