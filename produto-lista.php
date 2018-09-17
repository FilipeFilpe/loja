<?php
require_once('cabecalho.php');

$produtoDao = new ProdutoDao($conexao);

    $produtos = $produtoDao->listaProdutos();
    echo "<table class='table table-striped table-bordered'>";
        foreach ($produtos as $produto) {
            $id = $produto->getId();
            if($produto->temIsbn()) {
                $livro = "ISBN: ".$produto->getIsbn();
            } else {
                $livro = '';
            }
            echo "<tr>
                    <td>".$produto->getNome()."</td>
                    <td>".$produto->getPreco()."</td>
                    <td>".$produto->calculaImposto()."</td>
                    <td>".substr($produto->getDescricao(), 0, 40)."</td>
                    <td>".$produto->getCategoria()->getNome()."</td>
                    <td>".$livro."</td>
                    <td><a class='btn btn-primary' href='produto-altera-formulario.php?id=".$produto->getId()."'>alterar</a></td>
                    <td>
                        <form action='remove-produto.php' method='POST'>
                            <input type='hidden' name='id' value=".$produto->getId().">
                            <button class='btn btn-danger'>remover</button>
                        </form>
                    </td>
                  </tr>";
            
            $categoria = new Categoria($produto_array['categoria_nome']);
        }
    echo "</table>";

require_once('rodape.php'); ?>