<?php
    require_once('cabecalho.php');

    $tipoProduto = $_POST['tipoProduto'];
    $produto_id = $_POST['id'];
    $categoria_id = $_POST['categoria_id'];

    $factory = new ProdutoFactory();
    $produto = $factory->criaPor($tipoProduto, $_POST);
    $produto->atualizaBaseadoEm($_POST);

    $produto->setId($produto_id);
    $produto->getCategoria()->setId($categoria_id);

    if(array_key_exists('usado', $_POST)) {
        $produto->setUsado("true");
    } else {
        $produto->setUsado("false");
    }

    $produtoDao = new ProdutoDao($conexao);

    if ($produtoDao->alteraProduto($produto)) {
        echo "<p class='text-success'>O produto ".$produto->getNome().", R$ ".$produto->getPreco()." foi alterado</p>";
    } else {
        $msg = mysqli_error($conexao);
        echo "<p class='text-danger'>O produto ".$produto->getNome().", ".$produto->getNome()." nÃ£o foi alterado: $msg</p>";
    }


require_once('rodape.php'); ?>