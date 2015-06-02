<?php
//Starts
ob_start();
session_start();

//bloqueando erros
error_reporting(0);
ini_set(display_errors, 0);


if (isset($_COOKIE["logado"])) {
    include '../classes/conexao.php';
    include '../classes/controle_acesso.php';
    include '../classes/produto.php';

    $conexao = conexao::getObject();
    $acesso = controle_acesso::getObject();
    $class_produto = produto::getObject();

    $conexao->abrirConexao();
    $acao = "";

    include '../include/controle_pagina_usuario.php';
    ?>

    <!DOCTYPE html>

    <html lang="pt_BR">
        <head>
            <title>Vendas de suplemento</title>
            <meta charset="UTF-8">

            <link rel="stylesheet" type="text/css" href="css/style_geral.css">
            <link rel="stylesheet" type="text/css" href="css/style_pag_administrador.css">

            <script src="../js/geral.js"></script>

            <script>
                window.onload = function () {
                    var janela = document.getElementById('fundo_transparente');

                    var botao = document.getElementById('botao_exercicio');

                    var botao_sair_exercicio = document.getElementById('botao_sair_exercicio');

                    janela.style.display = 'none';

                    botao.onclick = function () {
                        janela.style.display = 'block';
                        return false;
                    };

                    botao_sair_exercicio.onclick = function () {
                        janela.style.display = 'none';
                        return false;
                    };
                };
            </script>
        </head>
        <body>

            <section id="fundo_transparente" style="display: none">
                <div id="criar_exercicio">
                    <div id="header_janela_exercicio">
                        <p class="texto_header_janela_exercicio">Criando exercício</p>
                        <a href="" id="botao_sair_exercicio"><p class="botao_sair_exercicio"><strong>x</strong></p></a>
                    </div>
                    <form method="post" action="">
                        <div id="semanas_janela_exercicio">
                            <input type="checkbox" name="dom" id="domingo" value="dom" style="width: 15px; height: 15px; margin: 5px" />
                            <label for="domingo" >Domingo</label><br />
                            <input type="checkbox" name="seg" id="segunda" value="seg" style="width: 15px; height: 15px; margin: 5px" />
                            <label for="segunda" >Segunda-feira</label><br />
                            <input type="checkbox" name="ter" id="terca" value="ter" style="width: 15px; height: 15px; margin: 5px" />
                            <label for="terca" >Terça-feira</label><br />
                            <input type="checkbox" name="qua" id="quarta" value="qua" style="width: 15px; height: 15px; margin: 5px" />
                            <label for="quarta" >Quarta-feira</label><br />
                        </div>

                        <div id="semanas_janela_exercicio">
                            <input type="checkbox" name="qui" id="quinta" value="qui" style="width: 15px; height: 15px; margin: 5px" />
                            <label for="quinta" >Quinta_feira</label><br />
                            <input type="checkbox" name="sex" id="sexta" value="sex" style="width: 15px; height: 15px; margin: 5px" />
                            <label for="sexta" >Sexta-feira</label><br />
                            <input type="checkbox" name="sab" id="sabado" value="sab" style="width: 15px; height: 15px; margin: 5px" />
                            <label for="sabado" >Sábado</label><br />
                        </div>

                        <label for="exercicio" style="margin-left: 15px">Exercício</label>
                        <input type="text" id="exercicio" name="exercicio" maxlength="30" />

                        <input type="submit" formaction="?acao=salvar_exercicio&amp;get_usuario=<?php echo $usuario["id_usuario"]; ?>" id="botao_janela_exercicio"/>
                    </form>
                </div>
            </section>

            <?php include './cabecalho.php'; ?>

            <section id="listando_produtos">
                <h2 class="produtos_cabecalho">Listando usuários</h2>

                <table id="listando_produtos_tabela" style="border-collapse: collapse">
                    <thead style="background-color: #c2c2c2; margin-bottom: 10px;">
                        <tr>
                            <td style="width: 500px; padding: 5px 0px">Login</td>
                            <td style="width: 300px; padding: 5px 0px">Email</td>
                            <td style="width: 150px; padding: 5px 0px">Tipo</td>
                            <td style="width: 100px; padding: 5px 0px">Saldo</td>
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
                        <tr class="linha_produtos">
                                <td style="text-align: left">
                                    <a id="linha" href="?acao=alterando_usuario&amp;get_usuario=<?php echo $item["id_usuario"]; ?>"><?php echo $item["login"]; ?></a>
                                </td>
                                <td><?php echo $item["email"] ?></td>
                                <td><?php
                                    if ($item["nivel"] == 0) {
                                        echo "Cliente";
                                    } else if ($item["nivel"] == 1) {
                                        echo "Administrador";
                                    }
                                    ?></td>
                                <td>
                                    <?php
                                    if ($item["nivel"] == 0) {
                                        echo $item["saldo"];
                                    } else if ($item["nivel"] == 1) {
                                        echo "-";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </section>

            <?php if (isset($usuario)) { ?>

                <section style="padding: 0px 10%">
                    <h2 class="produtos_cabecalho">Apresentando usuário</h2>

                    <div style="width: 45%; height: 200px; margin-left: 10px; display: inline-block">
                        <p>Dados do usuário</p>

                        <label>E-mail: </label><br />
                        <input type="text" value="<?php echo $usuario["email"] ?>" readonly>
                        <br />
                        <label>Login: </label><br />
                        <input type="text" value="<?php echo $usuario["login"] ?>" readonly>
                        <br />
                        <p style="float: right">Esse usuário é um: <?php
                            if ($usuario["nivel"] == 0) {
                                $id = $usuario["id_usuario"];
                                echo "Cliente (";

                                echo "<a href=\"?acao=cliente_adm&amp;get_usuario=$id\">Torná-lo administrador</a>";

                                echo ")";
                            } else if ($usuario["nivel"] == 1) {
                                echo "Administrador";
                            }
                            ?>
                        </p>
                    </div>

                    <?php if ($usuario["nivel"] == 0) { ?>

                        <div style="width: 45%; float: right; display: inline-block; position: relative; top: 20px">
                            <form method="post" action="">
                                <label for="valor">Saldo:</label><br />
                                <input type="text" name="saldo" id="saldo" placeholder="<?php echo $usuario["saldo"] ?>" onkeyup="mascara(this, real)" style="text-align: right">

                                <input type="submit" formaction="?acao=alterar_valor&amp;get_usuario=<?php echo $usuario["id_usuario"] ?>" value="Salvar" id="botao_salvar">
                            </form>

                            <a href="" id="botao_exercicio">Criar exercício</a>
                        </div>
                    <?php } ?>
                </section>
                <?php
            }

            include './rodape.php';
            ?>

        </body>
    </html>


<?php } else { ?>
    <script>alert("Você não está logado ainda. Faça o login!");</script>

    <meta HTTP-EQUIV='refresh' content='0; url=pagina_principal.php'>
    <?php
}
?>
