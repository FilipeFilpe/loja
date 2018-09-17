<?php
require_once('cabecalho.php');
require_once('./class/ProdutoDao.php');
require_once('logica-usuario.php');

verificaUsuario();

$categoria = new Categoria("");
$categoria->setId(1);

$produto = new LivroFisico("", "", "", $categoria, "");

$usado = "";

$categoriaDao = new CategoriaDao($conexao);
$categorias = $categoriaDao->listaCategorias();

?>
    <h1>Formulário de cadastro</h1>
    <form action="adiciona-produto.php" method="POST">
        <table class="table">
            <?php require_once('produto-formulario-base.php') ?>
            <tr>
                <td><input class="btn btn-primary" type="submit" value="Cadastrar" /></td>
            </tr>
        </table>
    </form>

<?php require_once('rodape.php'); ?>