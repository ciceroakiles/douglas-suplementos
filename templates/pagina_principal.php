<!DOCTYPE html>

<html lang="pt-BR">
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

                <a href="login.php">
                    <div class="botao_menu_principal">Entrar</div>
                </a>
            </nav>
        </header>

        <section id="buscar_produto">
            <form action="" method="post">
                <div id="conteudo_buscar">
                    <input type="text" id="input_buscar_principal" name="buscar" placeholder="Buscar" />

                    <input type="button" id="input_botao_buscar" formaction=""  />
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
                </form>
            </section>

            <section class="blocos_conteudo_complementar">
                <h2 class="cabecalho_bloco_conteudo_complementar">Patrocínio</h2>
            </section>
        </aside>

    </body>
</html>