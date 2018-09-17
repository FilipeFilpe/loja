<?php
require_once('cabecalho.php');
require_once('logica-usuario.php');

    verificaUsuario();

    $tipoProduto = $_POST['tipoProduto'];    
    $factory = new ProdutoFactory();
    $produto = $factory->criaPor($tipoProduto, $_POST);
    $produto->atualizaBaseadoEm($_POST);
    $produto->getCategoria()->setId($_POST['categoria_id']);
    
    if(array_key_exists('usado', $_POST)) {
        $produto->setUsado("true");
    } else {
        $produto->setUsado("false");
    }

    $produtoDao = new ProdutoDao($conexao);

    if ($produtoDao->insereProduto($produto)) {
        echo "<p class='text-success'>O produto ".$produto->getNome().", R$ ".$produto->getPreco()." foi adicionado</p>";
    } else {
        $msg = mysqli_error($conexao);
        echo "<p class='text-danger'>O produto ".$produto->getNome().", ".$produto->getPreco()." não foi adicionado: $msg</p>";
    }


require_once('rodape.php'); ?>