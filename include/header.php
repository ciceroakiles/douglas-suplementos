<?php

include '../classes/conexao.php';
include '../classes/controle_acesso.php';

//Starts
ob_start();
session_start();

//Globais
$home = "login.php";
$title = "Cheype - fix & Solution";
$user = "";
$acao = "";

$conexao = new conexao();
$conexao->abrirConexao();

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

//Método de cadastrar usuário
if ($acao == "cadastrar") {
    $classCadastro = new controle_acesso();
    
    $classCadastro->setEmail(addslashes($_POST["email"]));
    $classCadastro->setLogin(addslashes($_POST["login"]));
    $classCadastro->setSenha(addslashes(md5($_POST["senha"])));

    $classCadastro->salvandoLogin();
    
    $msg = $classCadastro->getMsg();
}

//Método de logar
if ($acao == "login") {
    $classLogin = new controle_acesso();
    
    $classLogin->setLogin(addslashes($_POST["login"]));
    $classLogin->setSenha(addslashes(md5($_POST["senha"])));

    $classLogin->validandoLogin();

    if (empty($classLogin->getMsg())) {
        $dados = $classLogin->getRegistro_tabela();
        
        $_SESSION ["login"] = $dados["login"];
        $_SESSION ["senha"] = $dados["senha"];
        $_SESSION ["nivel"] = $dados["nivel"];

        setcookie("logado", 1);
        $log = 1;
        
        echo "<meta HTTP-EQUIV='refresh' content='0; url=pag_administrador.php'>";
    }else{
        $msg = $classLogin->getMsg();
    }
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
    echo "<meta HTTP-EQUIV='refresh' content='0; url=pagina_principal.php'>";
}

//Variáveis de estilo
if (empty($msg)) {
    $display_message = "display: none;";
} else {
    $display_message = "display: block";
}    