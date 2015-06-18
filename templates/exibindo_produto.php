<?php
//Starts
ob_start();
session_start();

//bloqueando erros
error_reporting(0);
ini_set(display_errors, 0);

include '../classes/conexao.php';
include '../classes/produto.php';
include '../classes/controle_acesso.php';

$conexao = conexao::getObject();
$acesso = controle_acesso::getObject();
$class_produto = produto::getObject();

$conexao->abrirConexao();

if (isset($_GET["get_produto"])) {
    $class_produto->setProduto($_GET["get_produto"]);
}

$get_produto = $class_produto->getProduto();
$produto = mysql_fetch_array(mysql_query("SELECT * FROM produto WHERE id_produto = '$get_produto'"));

if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

if ($acao == "botao_comprar") {
    $quant_compra = $_POST["quant"];
    $id = $_SESSION["id"];
    $usuario = mysql_fetch_array(mysql_query("SELECT * FROM usuario WHERE id_usuario = $id"));
    $saldo_usuario = $usuario["saldo"];
    $valor_compra = $produto["valor"] * $quant_compra;

    if ($saldo_usuario >= $valor_compra) {
        $novo_saldo = $usuario["saldo"] - $valor_compra;
        $nova_quant = $produto["quantidade"] - $quant_compra;

        mysql_query("UPDATE usuario SET saldo = $novo_saldo WHERE id_usuario = $id");
        if ($nova_quant > 0) {
            mysql_query("UPDATE produto SET quantidade = $nova_quant WHERE id_produto = $get_produto");
        } else {
            mysql_query("DELETE FROM produto WHERE id_produto = $get_produto");
        }

        $msg = "Produto comprado!!";
    } else {
        $msg = "Esse usuário não tem saldo suficiente para realizar a compra.";
    }
}
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

        <?php include './cabecalho.php'; ?>

        <section id="titulo_produto_campo">
            <h1 id="titulo_produto"><?php echo $produto["nome"] ?></h1>
        </section>

        <section id="box_informacao_produto" >
            <img src="../imagem/img_modelo.svg" id="imagem_produto" alt="imagem_produto">

            <div id="box_informacao_basica">
                <h2 id="valor_produto">R$ <?php echo $produto["valor"] ?></h2>

                <form action="" method="post">
                    <div style="width: 150px; display: inline-block">
                        <label>Modelo: </label><br />
                        <input type="text" value="<?php echo $produto["modelo"] ?>" readonly>
                    </div>
                    <div style="width: 150px; display: inline-block">
                        <label>Categoria: </label><br />
                        <input type="text" value="<?php echo $produto["categoria"] ?>" readonly><br />
                    </div><br />
                    <label>Quantidade: </label><br />
                    <input type="number" min="1" max="<?php echo $produto["quantidade"] ?>" value="1" name="quant" id="quant" ><br />

                    <?php if (isset($_COOKIE["nivel"])) { ?>
                        <?php if ($_COOKIE["nivel"] == 0) { ?>
                            <input type="submit" formaction="pagina_principal.php?acao=botao_comprar&amp;get_produto=<?php echo $produto["id_produto"]; ?>" id="botao_comprar" value="Comprar" />
                            <?php
                        } else {
                            $msg = "Esse usuário é um administrador";
                        }
                        ?>
                        <?php
                    } else {
                        $msg = "Faça o login para liberar a compra";
                    }
                    ?>
                </form>

                <?php if (isset($msg)) { ?>
                    <div class="mensage"><?php echo $msg ?></div>
                <?php } ?>
            </div>
        </section>

        <div id="detalhes_tecnicos_produtos">
            <h2 id="detalhes_tecnicos_produtos_marcador">Especificações Técnicas</h2>

            <p id="detalhes_tecnicos_produtos_descricao">
                <?php echo $produto["descricao"] ?>
            </p>
        </div>

        <?php include './rodape.php'; ?>
    </body>
</html>