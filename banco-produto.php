<?php
require_once('conecta.php');
require_once('class/Produto.php');
require_once('class/Categoria.php');

function listaProdutos($conexao){
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
    while ($produto_array = mysqli_fetch_assoc($resultado)) {
        
        $produto = new Produto();
        
        $categoria = new Categoria();
        $categoria->setNome($produto_array['categoria_nome']);

        $produto->setId($produto_array['id']);
        $produto->setNome($produto_array['nome']);
        $produto->setPreco($produto_array['preco']);
        $produto->setDescricao($produto_array['descricao']);
        $produto->setCategoria($categoria);
        $produto->setUsado($produto_array['usado']);

        array_push($produtos, $produto);
    }
    return $produtos;
}

function insereProduto($conexao, Produto $produto) {

    $nome = $produto->getNome();
    $preco = $produto->getPreco();
    $descricao = $produto->getDescricao();
    $categoria = $produto->getCategoria()->getId();
    $usado = $produto->getUsado();

    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) 
        values ('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usado})";
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, Produto $produto) {

    $query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', 
            categoria_id= {$produto->categoria->id}, usado = {$produto->usado} where id = '{$produto->id}'";

    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {

    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $produto_buscado = mysqli_fetch_assoc($resultado);

    $categoria = new Categoria();
    $categoria->id = $produto_buscado['categoria_id'];

    $produto = new Produto();
    $produto->id = $produto_buscado['id'];
    $produto->nome = $produto_buscado['nome'];
    $produto->descricao = $produto_buscado['descricao'];
    $produto->categoria = $categoria;
    $produto->preco = $produto_buscado['preco'];
    $produto->usado = $produto_buscado['usado'];

    return $produto;
}

function removeProduto($conexao, $id) {
    $query = "DELETE FROM `produtos` WHERE `produtos`.`id` = {$id}";
    return mysqli_query($conexao, $query);
}