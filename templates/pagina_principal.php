<?php
//Starts
ob_start();
session_start();

include '../classes/conexao.php';
include '../classes/produto.php';
include '../classes/controle_acesso.php';

$conexao = conexao::getObject();
$acesso = controle_acesso::getObject();
$class_produto = produto::getObject();

$conexao->abrirConexao();
$acao = "";

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

if ($acao == "filtro_produto") {
    $class_produto->setFiltro(addslashes($_POST["buscar"]));
}

if ($acao == "exibe_produto") {
    $class_produto->setProduto(addslashes($_GET["get_produto"]));
}
?>


<!DOCTYPE html>

<html lang="pt_BR">
    <head>
        <title>Vendas de suplemento</title>
        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="css/style_geral.css">
        <link rel="stylesheet" type="text/css" href="css/style_pagina_principal.css">
    </head>
    <body>

        <?php include './cabecalho.php'; ?>

        <section id="espaco_produtos">

            <form action="" method="post">
                <div id="conteudo_buscar">
                    <input type="text" id="input_buscar_principal" name="buscar" placeholder="Buscar" />

                    <input type="submit" formaction="pagina_principal.php?acao=filtro_produto" value="" id="input_botao_buscar" formaction=""  />
                </div>
            </form>

            <?php
            $filtro = $class_produto->getFiltro();
            $usuarios = mysql_query("SELECT * FROM produto WHERE nome_1 LIKE '%$filtro%' ORDER BY id_produto DESC");
            $quant = mysql_num_rows($usuarios);

            if ($quant == 0) {
                ?>

                <div id="msg_produtos">
                    Nenhum produto encontrado... :(
                </div>

                <div style="margin-top: 20px; margin-bottom: 10px; font-size: 19px;">
                    <strong>VEJA BEM, temos outras ofertas!<strong>
                            </div>

                            <?php
                            $usuarios = mysql_query("SELECT * FROM produto ORDER BY id_produto DESC");
                        }
                        ?>

                        <ul style="list-style-type: none;">
                            <?php
                            while ($item = mysql_fetch_array($usuarios)) {
                                ?>
                                <a href="exibindo_produto.php?acao=exibe_produto&amp;get_produto=<?php echo $item["id_produto"] ?>">
                                    <li class="item_produto">
                                        <img src = "../imagem/img_modelo.svg" class = "imagem_produto" alt = "produto">

                                        <div class="item_conteudo_descricao">
                                            <h2 class="item_nome"><?php echo $item["nome_2"]; ?></h2>

                                            <p class="item_valor"><strong><?php echo $item["valor"]; ?></strong></p>
                                        </div>
                                    </li>
                                </a>
                            <?php } ?>
                        </ul>
                        </section>

                        <footer id="footer_pagina_principal">
                            <p style="margin: 0px; padding: 0px; margin-right: 20px">Desenvolvido por: 4SIsystem</p>
                        </footer>
                        </body>
                        </html>