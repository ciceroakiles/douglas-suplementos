<?php

include_once '../classes/conexao.php';

$conexao = new conexao();
$conexao->abrirConexao();

$acao = "";
$filtro = "";

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

if ($acao == "filtro_produto") {
    $filtro = addslashes($_POST["buscar"]);
}

if ($acao == "exibe_produto") {
    $get_produto = $_GET["get_produto"];
}