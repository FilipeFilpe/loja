<?php

class CategoriaDao
{
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function listaCategorias() {
        $categorias = array();
        $resultado = mysqli_query($this->conexao, "select * from categorias");

        while ($categoria_array = mysqli_fetch_assoc($resultado)) {
            $nome = $categoria_array['nome'];

            $categoria = new Categoria($nome);
            $categoria->setId($categoria_array['id']);

            array_push($categorias, $categoria);
        }
        return $categorias;
    }

    function adicionaCategoria(Categoria $categoria) {
        $nome = $categoria->getNome();
    }
}