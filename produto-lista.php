<?php
require_once('cabecalho.php');
require_once('banco-produto.php');
require_once('class/Produto.php');

    $produtos = listaProdutos($conexao);
    echo "<table class='table table-striped table-bordered'>";
        foreach ($produtos as $produto) {
            $id = $produto->getId();
            echo "<tr>
                    <td>".$produto->getNome()."</td>
                    <td>".$produto->getPreco()."</td>
                    <td>".$produto->precoComDesconto()."</td>
                    <td>".substr($produto->getDescricao(), 0, 40)."</td>
                    <td>".$produto->getCategoria()->getNome()."</td>
                    <td><a class='btn btn-primary' href='produto-altera-formulario.php?id=".$produto->getId()."'>alterar</a></td>
                    <td>
                        <form action='remove-produto.php' method='POST'>
                            <input type='hidden' name='id' value=".$produto->getId().">
                            <button class='btn btn-danger'>remover</button>
                        </form>
                    </td>
                  </tr>";
        }
    echo "</table>";

require_once('rodape.php'); ?>