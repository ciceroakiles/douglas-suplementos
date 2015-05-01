<?php

include '../include/produto.php';

$produto = mysql_fetch_array(mysql_query("SELECT * FROM produto WHERE id_produto = '$get_produto'"));
?>

<!DOCTYPE html>

<html lang="pt_BR">
    <head>
        <title>Vendas de suplemento</title>
        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="css/style_geral.css">
        <link rel="stylesheet" type="text/css" href="css/style_exibindo_produto.css">
    </head>
    <body>
        <header id="header_principal">
            <img src="../imagem/logo_suplemento.jpg" alt="logo" title="home" id="logo_cabecalho_principal">

            <nav id="menu_principal">
                <a href="../templates/pagina_principal.php">
                    <div class="botao_menu_principal">Home</div>
                </a>

                <a href="#">
                    <div class="botao_menu_principal">Sobre Nós</div>
                </a>

                <a href="login.php">
                    <div class="botao_menu_principal">Entrar</div>
                </a>
            </nav>
        </header>

        <h1 id="titulo_produto"><?php echo $produto["nome_2"] ?></h1>

        <img src="../imagem/img_modelo.svg" id="imagem_produto" alt="imagem_produto">

        <div id="box_informacao_basica" >

            <a href="#">
                <div  id="botao_comprar">Comprar</div>
            </a>

            <h2 id="valor_produto"><?php echo $produto["valor"] ?></h2>

            <p id="descricao_produto_limitada">
                <b>Modelo:</b> <?php echo $produto["modelo"] ?><br />
                <b>Categoria:</b> <?php echo $produto["categoria"] ?><br />
                <b>Quantidade:</b> <?php echo $produto["quantidade"] ?><br />
                <b>Desclição:</b> <?php echo $produto["descricao_1"] ?>
            </p>
        </div>

        <div id="detalhes_tecnicos_produtos">
            <h2 id="detalhes_tecnicos_produtos_marcador">Especificações Técnicas</h2>

            <p id="detalhes_tecnicos_produtos_descricao">
                <?php echo $produto["descricao_2"] ?>
            </p>
        </div>

        <footer id="footer_pagina_principal">
            <p style="margin: 0px; padding: 0px; margin-right: 20px">Desenvolvido por: 4SIsystem</p>
        </footer>
    </body>
</html>