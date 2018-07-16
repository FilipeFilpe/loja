<?php
require_once('cabecalho.php');
require_once('banco-produto.php');
require_once('class/Produto.php');
require_once('class/Categoria.php');

    $categoria = new Categoria();
    $categoria->setId($_POST['categoria_id']);

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $categoria;
    
    if (array_key_exists('usado', $_POST)){
        $usado = "true";
    } else {
        $usado = "false";
    }
    
    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
    $produto->setId($_POST['id']);
    
    if (alteraProduto($conexao, $produto)) {
        echo "<p class='text-success'>O produto ".$produto->getNome().", R$ ".$produto->getPreco()." foi alterado</p>";
    } else {
        $msg = mysqli_error($conexao);
        echo "<p class='text-danger'>O produto ".$produto->getNome().", ".$produto->getNome()." nÃ£o foi alterado: $msg</p>";
    }


require_once('rodape.php'); ?>