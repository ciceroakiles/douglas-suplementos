<?php
if (isset($_COOKIE["logado"])) {

    include '../include/header.php';

    /* Método para pegar o produto */
    if ($acao == "alterando_usuario") {

        $id = $_GET["get_usuario"];

        $usuarios = mysql_fetch_array(mysql_query("SELECT * FROM usuario WHERE id_usuario = $id"));
    }
    ?>

    <!DOCTYPE html>

    <html lang="pt_BR">
        <head>
            <title>Vendas de suplemento</title>
            <meta charset="UTF-8">

            <link rel="stylesheet" type="text/css" href="css/style_geral.css">
            <link rel="stylesheet" type="text/css" href="css/style_pag_administrador.css">

            <script src="../js/geral.js"></script>
        </head>
        <body>

            <header id="header_principal">
                <img src="../imagem/logo_suplemento.jpg" alt="logo" title="home" id="logo_cabecalho_principal">

                <nav id="menu_principal">
                    <a href="pagina_principal.php">
                        <div class="botao_menu_principal">Página Vendas</div>
                    </a>

                    <a href="pag_administrador.php">
                        <div class="botao_menu_principal">Produtos</div>
                    </a>

                    <a href="usuario.php">
                        <div class="botao_menu_principal" style="background-color: #c2c2c2">Usuário</div>
                    </a>

                    <a href="?acao=logout">
                        <div class="botao_menu_principal" style="background-color: #FFCDD2">Sair</div>
                    </a>
                </nav>
            </header>

            <section id="listando_produtos">
                <h2 id="produtos_cabecalho">Listando usuários</h2>

                <table id="listando_produtos_tabela">
                    <thead style="background-color: #c2c2c2; margin-bottom: 10px;">
                        <tr>
                            <td style="width: 350px; padding: 5px 0px">Login</td>
                            <td style="width: 350px; padding: 5px 0px">Email</td>
                            <td style="width: 220px; padding: 5px 0px">Status</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $usuarios = mysql_query("SELECT * FROM usuario ORDER BY id_usuario DESC");
                        $quant = mysql_num_rows($usuarios);

                        if ($quant == 0) {
                            ?>

                        <div id="msg_produtos">A lista de produtos está vazia... :(</div>
                        <?php
                    } else {

                        while ($item = mysql_fetch_array($usuarios)) {
                            ?>
                            <tr>
                                <td>
                                    <a href="usuario.php?acao=alterando_usuario&amp;get_usuario=<?php echo $item["id_usuario"]; ?>"><?php echo $item["login"]; ?></a>
                                </td>
                                <td><?php echo $item["email"] ?></td>
                                <td><?php if ($item["nivel"] == 0) { 
                                    echo "Cliente";
                                } else if ($item["nivel"] == 1){
                                    echo "Administrador";
                                }?></td>
                            </tr>
                        <?php }
                    }
                    ?>

                    </tbody>
                </table>
            </section>


            <footer id="footer_pagina_principal">
                <p style="margin: 0px; padding: 0px; margin-right: 20px">Desenvolvido por: 4SIsystem</p>
            </footer>
        </body>
    </html>


<?php } else { ?>
    <script>alert("Vc não está logado ainda, Faça o login!");</script>

    <meta HTTP-EQUIV='refresh' content='0; url=login.php'>
    <?php
}
?>