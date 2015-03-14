<?php

include '../classes/conexao.php';

//Starts
ob_start();
session_start();

//Globais
$home = "login.php";
$title = "Cheype - fix & Solution";
$user = "";
$acao = "";

$conexao = new conexao("localhost", "root", "", "ds");
$conexao->abrirConexão();

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

//Método de cadastrar usuário
if ($acao == "cadastrar") {
    include '../classes/cadastro.php';
    
    $classeCadastro = new cadastro(addslashes($_POST["email"]), addslashes($_POST["login"]), addslashes($_POST["senha"]));
    
    if ($classeCadastro->verificaConteudo()) {
        if ($classeCadastro->verificaEmail()) {
            $classeCadastro->salvando();
        }
    }
    
    $msg = $classeCadastro->getMsg();
}

//Método de logar
if ($acao == "login") {
    include '../classes/login.php';

    $classeLogin = new login(addslashes($_POST["login"]), md5($_POST["senha"]));

    if (!($classeLogin->verificaConteudo())) {

        if ($classeLogin->validandoAcesso()) {
            setcookie("logado", 1);
            $log = 1;

            echo "<meta HTTP-EQUIV='refresh' content='0; url=home.php'>";
        }
    }

    $msg = $classeLogin->getMsg();
}

//Método de checar usuário
if (isset($_SESSION["login"]) && isset($_SESSION["senha"])) {
    $logado = 1;
    $nivel = $_SESSION["nivel"];
}

//Método de logout
if ($acao == "logout") {
    setcookie("logado", "");
    unset($_SESSION["login"], $_SESSION["senha"], $_SESSION["nivel"]);
    echo "<meta HTTP-EQUIV='refresh' content='0; url=login.php'>";
}

//Variáveis de estilo
if (empty($msg)) {
    $display_message = "display: none;";
} else {
    $display_message = "display: block";
}    