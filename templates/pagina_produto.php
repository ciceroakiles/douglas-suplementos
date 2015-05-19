<?php
//Starts
ob_start();
session_start();

include '../classes/conexao.php';
include '../classes/produto.php';
include '../classes/controle_acesso.php';

$acesso = controle_acesso::getObject();
$conexao = conexao::getObject();
$class_produto = produto::getObject();

$conexao->abrirConexao();
$acao = "";

include '../include/controle_pag_administrador.php';

if (isset($_COOKIE["logado"])) {
    
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

            <?php include './cabecalho.php'; ?>

            <section id="listando_produtos">
                <h2 id="produtos_cabecalho">Listando produtos</h2>

                <table id="listando_produtos_tabela">
                    <thead style="background-color: #c2c2c2; margin-bottom: 10px;">
                        <tr>
                            <td style="width: 500px; padding: 5px 0px">Nome</td>
                            <td style="width: 200px; padding: 5px 0px">Quantidade</td>
                            <td style="width: 220px; padding: 5px 0px">Valor</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $usuarios = mysql_query("SELECT * FROM produto ORDER BY id_produto DESC");
                        $quant = mysql_num_rows($usuarios);

                        if ($quant == 0) {
                            ?>

                        <div id="msg_produtos">A lista de produtos está vazia... :(</div>
                        <?php
                        $usuarios = mysql_query("SELECT * FROM produto ORDER BY id_produto DESC");
                    }

                    while ($item = mysql_fetch_array($usuarios)) {
                        ?>
                        <tr>
                            <td>
                                <a href="?acao=alterando_produto&amp;get_produto=<?php echo $item["id_produto"]; ?>"><?php echo $item["nome_1"]; ?></a>
                            </td>
                            <td><?php echo $item["quantidade"]; ?></td>
                            <td><?php echo $item["valor"]; ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </section>

            <section id="adicionar_produtos">
                <h2 id="produtos_cabecalho">Adicionando produtos</h2>

                <form action="" method="post">
                    <div style="width: 49%; display: inline-block; text-align: left;">
                        <label for="nome_1">Primeiro nome do produto:</label>

                        <input type="text" name="nome_1" id="nome_1" maxlength="15" value="<?php
                        if (isset($produto)) {
                            echo $produto["nome_1"];
                        }
                        ?>"/>
                    </div>

                    <div style="width: 49%; display: inline-block;  text-align: left;" >
                        <label for="nome_2">Segundo nome do produto:</label>
                        <input type="text" name="nome_2" id="nome_2" maxlength="100" value="<?php
                        if (isset($produto)) {
                            echo $produto["nome_2"];
                        }
                        ?>"/>
                    </div>

                    <div style="width: 32.4%; display: inline-block; text-align: left">
                        <label for="modelo">Modelo do produto:</label>
                        <input type="text" name="modelo" id="modelo" maxlength="100" value="<?php
                        if (isset($produto)) {
                            echo $produto["modelo"];
                        }
                        ?>"/>
                    </div>

                    <div style="width: 32.4%; display: inline-block; text-align: left">
                        <label for="categoria">Categoria do produto:</label>
                        <input type="text" name="categoria" id="categoria" maxlength="100" value="<?php
                        if (isset($produto)) {
                            echo $produto["categoria"];
                        }
                        ?>"/>
                    </div>

                    <div style="width: 32.4%; display: inline-block; text-align: left">
                        <label for="quant">Quantidade do produto:</label>
                        <input type="number" name="quant" id="quant" value="<?php
                        if (isset($produto)) {
                            echo $produto["quantidade"];
                        }
                        ?>"/>
                    </div>

                    <div style="width: 49%; display: inline-block;  text-align: left; vertical-align: top">
                        <fieldset style="background-color: #fff;">
                            <legend>Descrição mínima do produto</legend>
                            <textarea class="descricao" name="descricao_1" maxlength="150" style="height: 80px"><?php
                                if (isset($produto)) {
                                    echo $produto["descricao_1"];
                                }
                                ?></textarea>
                        </fieldset>
                    </div>

                    <div style="width: 49%; display: inline-block;  text-align: left;">
                        <fieldset style="background-color: #fff;">
                            <legend>Descrição detalhada do produto</legend>
                            <textarea class="descricao" name="descricao_2" ><?php
                                if (isset($produto)) {
                                    echo $produto["descricao_2"];
                                }
                                ?></textarea>
                        </fieldset>
                    </div>

                    <div style="width: 300px; text-align: left; margin-left: 35px">
                        <label for="valor">Valor do produto:</label>
                        <input type="text" name="valor" id="valor" style="border: 1px solid #00695C; border-radius: 3px; background-color: #d6fed7; text-align: right;" maxlength="20" onkeyup="mascara(this, real)" value="<?php
                        if (isset($produto)) {
                            echo $produto["valor"];
                        }
                        ?>"/>
                    </div>

                    <div style="text-align: right">
                        <?php if (isset($produto)) { ?>
                            <input type="submit" formaction="?acao=alterar_produto&amp;get_produto=<?php echo $produto["id_produto"]; ?>" value="Alterar" id="botao_salvar_produto">
                            <input type="submit" formaction="?acao=deletar_produto&amp;get_produto=<?php echo $produto["id_produto"]; ?>" value="Deletar" id="botao_salvar_produto">
                        <?php } else { ?>
                            <input type="submit" formaction="?acao=salvar_produto" value="Salvar" id="botao_salvar_produto">
                        <?php } ?>
                    </div>
                </form>
            </section>

            <footer id="footer_pagina_principal">
                <p style="margin: 0px; padding: 0px; margin-right: 20px">Desenvolvido por: 4SIsystem</p>
            </footer>
        </body>
    </html>


<?php } else {
    ?>
    <script>alert("Vc não está logado ainda ou não tem permissão, Faça o login!");</script>

    <meta HTTP-EQUIV='refresh' content='0; url=pagina_principal.php'>
    <?php
}
?>