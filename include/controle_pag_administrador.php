<?php

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

/* Método para pegar o produto */
if ($acao == "alterando_produto") {

    $id = $_GET["get_produto"];

    $produto = mysql_fetch_array(mysql_query("SELECT * FROM produto WHERE id_produto = $id"));
}

/* Método de salvar produtos */
if ($acao == "salvar_produto") {
    $nome1 = $_POST["nome_1"];
    $nome2 = $_POST["nome_2"];
    $modelo = $_POST["modelo"];
    $categoria = $_POST["categoria"];
    $quant = $_POST["quant"];
    $descricao_1 = $_POST["descricao_1"];
    $descricao_2 = $_POST["descricao_2"];
    $valor = $_POST["valor"];

    mysql_query("INSERT INTO produto VALUES (NULL, '$nome1', '$nome2', '$modelo', '$categoria', '$quant', '$descricao_1', '$descricao_2', '$valor')");

    echo "<meta HTTP-EQUIV='refresh' content='0; url=pagina_produto.php'>";
}

/* Alterar um registro da tabela */
if ($acao == "alterar_produto") {
    $nome1 = $_POST["nome_1"];
    $nome2 = $_POST["nome_2"];
    $modelo = $_POST["modelo"];
    $categoria = $_POST["categoria"];
    $quant = $_POST["quant"];
    $descricao_1 = $_POST["descricao_1"];
    $descricao_2 = $_POST["descricao_2"];
    $valor = $_POST["valor"];
    $id = $_GET["get_produto"];

    mysql_query("UPDATE produto SET nome_1 = '$nome1', nome_2 = '$nome2', modelo = '$modelo', categoria = '$categoria', quantidade = '$quant', descricao_1 = '$descricao_1', descricao_2 = '$descricao_2', valor = '$valor' WHERE id_produto = $id");
    echo "<meta HTTP-EQUIV='refresh' content='0; url=pagina_produto.php'>";
}

/* Método para deletar produto */
if ($acao == "deletar_produto") {
    $id = $_GET["get_produto"];

    mysql_query("DELETE FROM produto WHERE id_produto = $id");
    echo "<meta HTTP-EQUIV='refresh' content='0; url=pagina_produto.php'>";
}

