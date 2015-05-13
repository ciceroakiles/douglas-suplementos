<?php
include '../include/header.php';

?>


<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>DS - Suplemento</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style_geral.css">
        <link rel="stylesheet" type="text/css" href="css/style_login&cadastro.css">
    </head>
    <body>

        <div id="espaco">
            <div class="mensage">Acesso exclusivo ao administrador!</div>
            <div class="mensage" style="<?php echo $display_message; ?>"><?php echo $msg; ?></div>
            <form action="" method="post">
                <label for="login">Login: </label>
                <input type="text" id="login" maxlength="50" name="login" value="" autofocus />

                <label for="senha" >Senha: </label>
                <input type="password" id="senha" maxlength="50" name="senha" value="" />

                <center>
                    <input type="submit" formaction="?acao=login" class="botao animacao" value="Entrar" />
                    <input type="submit" formaction="cadastro.php" class="botao animacao" value="Cadastrar" title="Cadastre-se"/>
                </center>
            </form>
        </div>
    </body>
</html>