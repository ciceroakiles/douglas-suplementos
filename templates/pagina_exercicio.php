<?php
//Starts
ob_start();
session_start();


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
            <link rel="stylesheet" type="text/css" href="css/style_pagina_exercicio.css">


        </head>
        <body>

            <?php
            include './cabecalho.php';
            $id = $_SESSION["id"];

            $query = mysql_query("SELECT * FROM exercicio WHERE id_usuario = $id");
            ?>

            <section style="padding: 0px 10%; margin: 30px 0px">
                <table id="tabela_exercicio">
                    <thead>
                        <tr>
                            <th>Dia da Semana</th>
                            <th>Exercício</th>
                        </tr>
                    </thead>
                    <tr class="border_tr">
                        <td>Domingo</td>
                        <td>
                            <?php
                            $query = mysql_query("SELECT * FROM exercicio WHERE id_usuario = $id");

                            while ($item = mysql_fetch_array($query)) {
                                if ($item["semana"] == 'dom') {
                                    echo $item["exercicio"] . '<br />';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr class="border_tr">
                        <td>Segunda-feira</td>
                        <td>
                            <?php
                            $query = mysql_query("SELECT * FROM exercicio WHERE id_usuario = $id");

                            while ($item = mysql_fetch_array($query)) {
                                if ($item["semana"] == 'seg') {
                                    echo $item["exercicio"] . '<br />';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr class="border_tr">
                        <td>Terça-feira</td>
                        <td>
                            <?php
                            $query = mysql_query("SELECT * FROM exercicio WHERE id_usuario = $id");

                            while ($item = mysql_fetch_array($query)) {
                                if ($item["semana"] == 'ter') {
                                    echo $item["exercicio"] . '<br />';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr class="border_tr">
                        <td>Quarta-feira</td>
                        <td>
                            <?php
                            $query = mysql_query("SELECT * FROM exercicio WHERE id_usuario = $id");

                            while ($item = mysql_fetch_array($query)) {
                                if ($item["semana"] == 'qua') {
                                    echo $item["exercicio"] . '<br />';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr class="border_tr">
                        <td>Quinta-feira</td>
                        <td>
                            <?php
                            $query = mysql_query("SELECT * FROM exercicio WHERE id_usuario = $id");

                            while ($item = mysql_fetch_array($query)) {
                                if ($item["semana"] == 'qui') {
                                    echo $item["exercicio"] . '<br />';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr class="border_tr">
                        <td>Sexta-feira</td>
                        <td>
                            <?php
                            $query = mysql_query("SELECT * FROM exercicio WHERE id_usuario = $id");

                            while ($item = mysql_fetch_array($query)) {
                                if ($item["semana"] == 'sex') {
                                    echo $item["exercicio"] . '<br />';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr style="height: 40px">
                        <td>Sábado</td>
                        <td>
                            <?php
                            $query = mysql_query("SELECT * FROM exercicio WHERE id_usuario = $id");

                            while ($item = mysql_fetch_array($query)) {
                                if ($item["semana"] == 'sab') {
                                    echo $item["exercicio"] . '<br />';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </section>


            <?php include './rodape.php'; ?>
        </body>
    </html>


<?php } else { ?>
    <script>alert("Você não está logado ainda. Faça o login!");</script>

    <meta HTTP-EQUIV='refresh' content='0; url=pagina_principal.php'>
    <?php
}
?>
