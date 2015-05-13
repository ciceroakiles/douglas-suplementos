<?php
include '../include/header.php';
?>


<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>DS - Suplementos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style_geral.css">
        <link rel="stylesheet" type="text/css" href="css/style_login&cadastro.css">
    </head>
    <body>

        <div id="espaco" style="margin-top: 200px;">
            <div class="mensage" style="<?php echo $display_message; ?>"><?php echo $msg; ?></div>

            <form action="" method="post">
                <label for="email">Email: </label>
                <input type="text" id="email" maxlength="50" name="email" value="" autofocus />
                
                <label for="login">Login: </label>
                <input type="text" id="login" maxlength="50" name="login" value="" />

                <label for="senha" >Senha: </label>
                <input type="password" id="senha" maxlength="50" name="senha" value="" />

                <center>
                    <input type="submit" formaction="?acao=cadastrar" class="botao animacao" value="Salvar" />
                    <input type="submit" formaction="login.php" class="botao animacao" value="Login"/>
                </center>
            </form>
        </div>
    </body>
</html>