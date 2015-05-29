<?php
//Starts
ob_start();
session_start();

//bloqueando erros
error_reporting(0);
ini_set(display_errors, 0);

if (isset($_COOKIE["logado"])) {

    include '../classes/conexao.php';
    include '../classes/produto.php';
    include '../classes/controle_acesso.php';

    $acesso = controle_acesso::getObject();
    $conexao = conexao::getObject();
    $class_produto = produto::getObject();

    $conexao->abrirConexao();
    $acao = "";

    include '../include/controle_pag_administrador.php';
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
                <h2 class="produtos_cabecalho">Listando produtos</h2>

                <table id="listando_produtos_tabela" style="border-collapse: collapse;">
                    <thead style="background-color: #c2c2c2; margin-bottom: 10px;">
                        <tr>
                            <td style="width: 800px; padding: 5px 0px">Nome</td>
                            <td style="width: 40px; padding: 5px 0px">Quant.</td>
                            <td style="width: 120px; padding: 5px 0px">Valor</td>
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
                        <tr class="linha_produtos">
                            <td style="text-align: left">
                                <a id="item" href="?acao=alterando_produto&amp;get_produto=<?php echo $item["id_produto"]; ?>"><?php echo $item["nome"]; ?></a>
                            </td>
                            <td><?php echo $item["quantidade"]; ?></td>
                            <td><?php echo $item["valor"]; ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </section>

            <section id="adicionar_produtos">
                <h2 class="produtos_cabecalho">Adicionando produtos</h2>

                <form action="" method="post">

                    <div style="width: 49%; display: inline-block;  text-align: left;" >
                        <label for="nome">Nome do produto:</label>
                        <input type="text" name="nome" id="nome" maxlength="100" value="<?php
                        if (isset($produto)) {
                            echo $produto["nome"];
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
                        <input type="number" name="quant" id="quant" min="1" value="<?php
                        if (isset($produto)) {
                            echo $produto["quantidade"];
                        } else {
                            echo 1;
                        }
                        ?>"/>
                    </div>

                    <div style="width: 49%; display: inline-block;  text-align: left;">
                        <fieldset style="background-color: #fff;">
                            <legend>Descrição do produto</legend>
                            <textarea class="descricao" name="descricao" ><?php
                                if (isset($produto)) {
                                    echo $produto["descricao"];
                                }
                                ?></textarea>
                        </fieldset>
                    </div>

                    <div style="width: 300px; text-align: left; margin-left: 35px">
                        <label for="valor">Valor do produto:</label>
                        <input type="" name="valor" id="valor" style="border: 1px solid #00695C; border-radius: 3px; background-color: #d6fed7; text-align: right;" maxlength="20" onkeyup="mascara(this, real)" value="<?php
                        if (isset($produto)) {
                            echo $produto["valor"];
                        } else {
                            echo 0;
                        }
                        ?>"/>
                    </div>

                    <div style="text-align: right">
                        <?php if (isset($produto)) { ?>
                            <input type="submit" formaction="?acao=alterar_produto&amp;get_produto=<?php echo $produto["id_produto"]; ?>" value="Alterar" id="botao_alterar_produto" class="botao_salvar_produto">
                            <input type="submit" formaction="?acao=deletar_produto&amp;get_produto=<?php echo $produto["id_produto"]; ?>" value="Deletar" id="botao_deletar_produto" class="botao_salvar_produto">
                        <?php } else { ?>
                            <input type="submit" formaction="?acao=salvar_produto" value="Salvar" id="botao_salvar_produto" class="botao_salvar_produto">
                        <?php } ?>
                    </div>
                </form>
            </section>

            <?php include './rodape.php'; ?>
        </body>
    </html>


<?php } else {
    ?>
    <script>alert("Você não está logado ainda. Faça o login!");</script>

    <meta HTTP-EQUIV='refresh' content='0; url=pagina_principal.php'>
    <?php
}
?>