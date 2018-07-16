<?php
require_once('cabecalho.php');
require_once('banco-produto.php');
require_once('banco-categoria.php');
require_once('logica-usuario.php');

verificaUsuario();

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
$usado = $produto->getUsado() ? "checked='checked'" : "";

?>
    <h1>Alterando produto</h1>
    <form action="altera-produto.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto->getId() ?>">
        <table class="table">
            <?php require_once('produto-formulario-base.php');?>
            <tr>
                <td><input class="btn btn-primary" type="submit" value="Alterar" /></td>
            </tr>
        </table>
    </form>

<?php require_once('rodape.php'); ?>