<header id="header_principal">
    <img src="../imagem/logo_suplemento.jpg" alt="logo" title="home" id="logo_cabecalho_principal">

    <?php
    if (!isset($_COOKIE["logado"])) {
        ?>
        <div id="logar">
            <form action="" method="post">
                <div style="display: inline-block">
                    <label for="login">Usuário:</label><br />
                    <input type="text" name="login" id="login" class="campos_login" />
                </div>
                <div style="display: inline-block">
                    <label for="senha">Senha:</label><br />
                    <input type="password" name="senha" id="senha" class="campos_login" />
                </div>
                <div style="display: inline-block; vertical-align: top; margin-top: 8px;">
                    <input type="submit" id="botao_entrar" formaction="?acao=login" value="Login">
                </div>
                <a href="#">
                    <p class="suporte_login">criar conta</p>
                </a>
            </form>
            <?php
        } else {
            ?>
            <div id="logado">
                Bem vindo: <?php echo $_SESSION["login"]?><br />
                <a href="?acao=logout" style="color: #ff0000;">
                    sair
                </a>
            </div>
            <?php
        }
        ?>
    </div>
</header>

<section id="barra_menu">
    <nav>
        <a href="../templates/pagina_principal.php">
            <div class="botao_menu_principal animacao">Home</div>
        </a>

        <?php
        if (isset($_COOKIE["nivel"])) {
            if ($_COOKIE["nivel"] == 1) {
                ?>
                <a href="pagina_produto.php">
                    <div class="botao_menu_principal animacao">Produto</div>
                </a>

                <a href="#">
                    <div class="botao_menu_principal animacao">Usuários</div>
                </a>
                <?php
            }
        }
        ?>

        <a href="#">
            <div class="botao_menu_principal animacao">Sobre Nós</div>
        </a>
    </nav>
</section>

<div id="mensage">
    <?php echo $acesso->getMsg(); ?>
</div>


<?php
if (isset($_GET["acao"])) {
    $acao = $_GET["acao"];
}

//Método de cadastrar usuário
if ($acao == "cadastrar") {

    $acesso->setEmail(addslashes($_POST["email"]));
    $acesso->setLogin(addslashes($_POST["login"]));
    $acesso->setSenha(addslashes(md5($_POST["senha"])));

    $acesso->salvandoLogin();

    $msg = $acesso->getMsg();
}

//Método de logar
if ($acao == "login") {

    $acesso->setLogin(addslashes($_POST["login"]));
    $acesso->setSenha(addslashes(md5($_POST["senha"])));

    $acesso->validandoLogin();

    if (empty($acesso->getMsg())) {
        $dados = $acesso->getRegistro_tabela();

        $_SESSION ["login"] = $dados["login"];
        $_SESSION ["senha"] = $dados["senha"];
        $_SESSION ["nivel"] = $dados["nivel"];

        setcookie("logado", 1);
        setcookie("nivel", $dados["nivel"]);
        $log = 1;

        echo "<meta HTTP-EQUIV='refresh' content='0; url=pagina_principal.php'>";
    } else {
        $msg = $acesso->getMsg();
    }
}

//Método de checar usuário
if (isset($_SESSION["login"]) && isset($_SESSION["senha"])) {
    $logado = 1;
    $nivel = $_SESSION["nivel"];
}

//Método de logout
if ($acao == "logout") {
    setcookie("logado", "");
    setcookie("nivel", "");
    unset($_SESSION["login"], $_SESSION["senha"], $_SESSION["nivel"]);
    echo "<meta HTTP-EQUIV='refresh' content='0; url=pagina_principal.php'>";
}
?>