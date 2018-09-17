<?php
require_once('cabecalho.php');
require_once('logica-usuario.php');

    verificaUsuario();

    $produtoDao = new ProdutoDao($conexao);
    $id = $_POST['id'];
    $produtoDao->removeProduto($id);    
    $_SESSION["success"] = "Produto removido com sucesso!";
    header('Location: produto-lista.php');
    die();

require_once('rodape.php'); ?>