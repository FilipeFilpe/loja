<?php
    require_once('logica-usuario.php');

    function carregaClasse($nomeDaClasse) {
        require_once("class/". $nomeDaClasse .".php");
    }
    // Registrando uma função como autoload
    spl_autoload_register("carregaClasse");

    error_reporting(E_ALL ^ E_NOTICE);
    require_once('mostra-alerta.php');
    require_once('conecta.php');
?>

<html>
<head>
    <title>Minha loja</title>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/loja.css" rel="stylesheet" />
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-headar">
                <a class="navbar-brand" href="index.php">Minha Loja</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="produto-formulario.php">Adiciona Produto</a></li>
                    <li><a href="produto-lista.php">Lista de Produtos</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>

            <div class="logado">
                <?php
                    if (usuarioEstaLogado()) {
                        echo "Usuário:<br> ".usuarioLogado()."<br>";
                        echo "<button type='button' class='btn btn-info btn-sm'><a href='logout.php'>Deslogar</a></button>";
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="principal">
            <?php
                mostraAlerta("success");
                mostraAlerta("danger");
            ?>
    <!-- fim cabecalho.php -->