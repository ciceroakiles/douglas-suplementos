<?php

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

/* Método para pegar o produto */
if ($acao == "alterando_usuario") {

    $id = $_GET["get_usuario"];

    $usuario = mysql_fetch_array(mysql_query("SELECT * FROM usuario WHERE id_usuario = $id"));
}

if ($acao == "alterar_valor") {
    $credito = $_POST["saldo"];
    $id = $_GET["get_usuario"];
    $usuario = mysql_fetch_array(mysql_query("SELECT * FROM usuario WHERE id_usuario = $id"));
    
    $credito = $usuario["saldo"] + $credito;
    
    mysql_query("UPDATE usuario SET saldo = '$credito' WHERE id_usuario = $id");
    
    echo "<meta HTTP-EQUIV='refresh' content='0; url=pagina_usuario.php'>";
}

if ($acao == "salvar_exercicio"){
    $semana = $_POST["semana"];
    $exercicio = $_POST["exercicio"];
    $cliente = $_GET["get_usuario"];
    
    mysql_query("INSERT INTO exercicio VALUES (NULL, '$cliente', '$semana', '$exercicio')");
}

if ($acao == "cliente_adm"){
    $cliente = $_GET['get_usuario'];
    
    mysql_query("UPDATE usuario SET nivel = '1' WHERE id_usuario = $cliente");
}

if ($acao == "display_exercicio"){
    $display_exercicio = "";
}

if ($acao == "display_exercicio_none"){
    $display_exercicio = "display: none";
}