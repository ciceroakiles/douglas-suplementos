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
        <?php if ($logado == 1) { ?>

            <?php if ($_SESSION["nivel"] == 1) { ?>
                <p>Usuario avançado...</p>
            <?php } else { ?>
                <p>Usuario comum...</p>
            <?php
            }
        } else { ?>
                <div class="mensage">Faça o login para usar o sistema...</div>
        <?php } ?>

    </body>
</html>