<?php
if (isset($_COOKIE["logado"])) {

    include '../include/header.php';
    ?>

    <!DOCTYPE html>

    <html lang="pt_BR">
        <head>
            <title>Vendas de suplemento</title>
            <meta charset="UTF-8">

            <link rel="stylesheet" type="text/css" href="css/style_geral.css">
            <link rel="stylesheet" type="text/css" href="css/style_pag_administrador.css">
        </head>
        <body>

            <header id="header_principal">
                <img src="../imagem/logo_suplemento.jpg" alt="logo" title="home" id="logo_cabecalho_principal">

                <nav id="menu_principal">
                    <a href="#">
                        <div class="botao_menu_principal">Produtos</div>
                    </a>

                    <a href="#">
                        <div class="botao_menu_principal">Clientes</div>
                    </a>

                    <a href="?acao=logout">
                        <div class="botao_menu_principal" style="background-color: #FFCDD2">Sair</div>
                    </a>
                </nav>
            </header>



            <footer id="footer_pagina_principal">
                <p style="margin: 0px; padding: 0px; margin-right: 20px">Desenvolvido por: 4SIsystem</p>
            </footer>
        </body>
    </html>


<?php } else { ?>
    <script>alert("Vc não está logado ainda, Faça o login!");</script>

    <meta HTTP-EQUIV='refresh' content='0; url=login.php'>
<?php } ?>