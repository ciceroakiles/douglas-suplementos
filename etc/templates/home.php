<?php
include '../include/header.php';
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>DS - Suplementos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style_geral.css">
    </head>
    <body>
        <?php if ($nivel == 0) { ?>
            <p>usuario comum entrou...</p>
        <?php
        } else {
            if ($nivel == 1) {
                ?>
                <p>usuario avançado...</p>
    <?php }
} ?>
    </body>
</html>