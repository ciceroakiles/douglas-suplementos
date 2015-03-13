<?php

//Starts
ob_start();
session_start();

//Globais
$home = "login.php";
$title = "Cheype - fix & Solution";
$user = "";
$acao = "";

//Conectando ao banco
function conectar() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "ds";

    $conexao = mysql_connect($host, $user, $pass);
    $selectdb = mysql_select_db($bd, $conexao);

    return $selectdb;
}

//Abrindo conexão com o banco
function abrirConexao() {
    $conectar = conectar();
}

function fecharConexao() {
    mysql_close();
}

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

//Método de cadastrar usuário
if ($acao == "cadastrar") {
    $email = addslashes($_POST["email"]);
    $login = addslashes($_POST["login"]);
    $senha = md5($_POST["senha"]);
    abrirConexao();

    if (empty($email) || empty($login) || empty($senha)) {
        $msg = "Preencha todos os campos!";
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //email correto

            //validadndo email
            $validarusuario = mysql_query("SELECT * FROM usuario WHERE login = '$login'");
            $contar = mysql_num_rows($validarusuario);

            if ($contar == 0) {
                //inserção do banco de dados
                $insert = mysql_query("INSERT INTO usuario (email, login, senha, nivel, status) VALUES ('$email', '$login', '$senha', 0, 0)");
                if (!(isset($insert))) {
                    $msg = "Usuario não cadastrado";
                } else {
                    $msg = "Usuario cadastrado";
                }
            } else {
                //email invalido
                $msg = "Usuário já cadastrado!";
            }
        } else {
            //email incorreto
            $msg = "Digite o seu email corretamente";
        }
    }

    fecharConexao();
}

//Método de logar
if ($acao == "login") {
    //dados
    $login = addslashes($_POST["login"]);
    $senha = md5($_POST["senha"]);
    abrirConexao();

    if (empty($login) || empty($senha)) {
        //Verificando se os campos estão vázios
        $msg = "Preencha todos os campos!";
    } else {
        //executando a busca pelo usuário
        $buscar = mysql_query("SELECT * FROM `usuario` WHERE login = '$login' AND senha = '$senha' LIMIT 1");
        if (mysql_num_rows($buscar) == 1) {
            $dados = mysql_fetch_array($buscar);
            
            if ($dados["status"] == '1') {
                $_SESSION ["login"] = $dados["login"];
                $_SESSION ["senha"] = $dados["senha"];
                $_SESSION ["nivel"] = $dados["nivel"];

                setcookie("logado", 1);
                $log = 1;
                
                echo "<meta HTTP-EQUIV='refresh' content='0; url=home.php'>";
            } else {
                $msg = "Aguarde a nossa aprovação!";
            }
        }
        if (!(isset($log))) {
            if (empty($msg)) {
                $msg = "Usuário ou Senha incorreta!";
            }
        }
    }

    fecharConexao();
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