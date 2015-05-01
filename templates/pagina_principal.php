<?php
include '../include/produto.php';
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

        <header id="header_principal">
            <img src="../imagem/logo_suplemento.jpg" alt="logo" title="home" id="logo_cabecalho_principal">

            <nav id="menu_principal">
                <a href="../templates/pagina_principal.php">
                    <div class="botao_menu_principal">Home</div>
                </a>

                <a href="#">
                    <div class="botao_menu_principal">Sobre Nós</div>
                </a>

                <a href="pag_administrador.php">
                    <div class="botao_menu_principal">Entrar</div>
                </a>
            </nav>
        </header>

        <section id="buscar_produto">
            <form action="" method="post">
                <div id="conteudo_buscar">
                    <input type="text" id="input_buscar_principal" name="buscar" placeholder="Buscar" />

                    <input type="submit" formaction="pagina_principal.php?acao=filtro_produto" value="" id="input_botao_buscar" formaction=""  />
                </div>
            </form>
        </section>

        <aside id="conteudo_complementar">
            <section class="blocos_conteudo_complementar">
                <h2 class="cabecalho_bloco_conteudo_complementar">Filtro</h2>

                <form action="" method="post">
                    <fieldset id="fieldset_blocos_conteudo">
                        <legend>Valor: </legend>
                        <input type="radio" name="radio" id="radio1" value="radio1" class="radio_blocos_conteudo_complementar" />
                        <label for="radio1">10,00 - 100,00</label><br />

                        <input type="radio" name="radio" id="radio2" value="radio2" class="radio_blocos_conteudo_complementar" />
                        <label for="radio2">100,00 - 200,00</label>
                    </fieldset>

                    <input type="button" formaction="pagina_principal.php" value="Filtrar" style="cursor: pointer;"/>
                </form>
            </section>

            <section class="blocos_conteudo_complementar">
                <h2 class="cabecalho_bloco_conteudo_complementar">Patrocínio</h2>
            </section>
        </aside>

        <section id="espaco_produtos">

            <?php
            $produtos = mysql_query("SELECT * FROM produto WHERE nome_1 LIKE '%$filtro%' ORDER BY id_produto DESC");
            $quant = mysql_num_rows($produtos);

            if ($quant == 0) {
                ?>

            <div id="msg_produtos">
                Nenhum produto encontrado... :(
            </div>
            
            <div style="margin-top: 20px; margin-bottom: 10px; font-size: 19px;">
                <strong>VEJA BEM, temos outras ofertas!<strong>
            </div>

                <?php
                $produtos = mysql_query("SELECT * FROM produto ORDER BY id_produto DESC");
            }

            while ($item = mysql_fetch_array($produtos)) {
                ?>

            <a href = "exibindo_produto.php?acao=exibe_produto&amp;get_produto=<?php echo $item["id_produto"] ?>" class = "exibindo_produto">
                    <img src = "../imagem/img_modelo.svg" class = "imagem_produto" alt = "produto">

                    <div class = "descrisao_produto">
                        <h2 class = "nome_produto"><?php echo $item["nome_1"] ?></h2>

                        <p class = "informacao_produto">
                            <?php echo $item["descricao_1"] ?>
                        </p>

                        <p class = "valor_produto"><b><?php echo $item["valor"] ?></b></p>
                    </div>
                </a>
            <?php } ?>

        </section>

        <footer id="footer_pagina_principal">
            <p style="margin: 0px; padding: 0px; margin-right: 20px">Desenvolvido por: 4SIsystem</p>
        </footer>
    </body>
</html>
