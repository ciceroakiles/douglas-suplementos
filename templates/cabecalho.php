
<?php
$display_criando_conta = "none";

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

        $_SESSION ["id"] = $dados["id_usuario"];
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

if ($acao == "criar_conta") {
    $display_criando_conta = "block";
}

if ($acao == "sair_criar_conta") {
    $display_criando_conta = "none";
}

//Método de logout
if ($acao == "logout") {
    setcookie("logado", "");
    setcookie("nivel", "");
    unset($_SESSION["login"], $_SESSION["senha"], $_SESSION["nivel"], $_SESSION["id"]);
    echo "<meta HTTP-EQUIV='refresh' content='0; url=pagina_principal.php'>";
}
?>


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
                <p class="suporte_login">
                    <a href="?acao=criar_conta">
                        criar conta
                    </a>
                </p>
                <?php if (isset($msg)) { ?>
                    <p id="mensage"><?php echo $msg ?></p>
                <?php } ?>
            </form>
            <?php
        } else {
            ?>
            <div id="logado">
                Bem vindo: <?php echo $_SESSION["login"] ?><br />
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
                    <div class="botao_menu_principal animacao">Produtos</div>
                </a>

                <a href="pagina_usuario.php">
                    <div class="botao_menu_principal animacao">Usuários</div>
                </a>
                <?php
            }

            if ($_COOKIE["nivel"] == 0) {
                ?>
                <a href="pagina_exercicio.php">
                    <div class="botao_menu_principal animacao">Exercício</div>
                </a>
                <?php
            }
        }
        ?>
    </nav>
</section>

<div id="criando_conta" style="display: <?php echo $display_criando_conta; ?>">
    <a href="?acao=sair_criar_conta">
        <p class="botao_sair_cabecalho">x</p>
    </a>

    <form action="" method="post">
        <label for="email">Email: </label>
        <input type="text" id="email" maxlength="50" name="email" value="" autofocus/>

        <label for="login">Login: </label>
        <input type="text" id="login" maxlength="50" name="login" value="" />

        <label for="senha" >Senha: </label>
        <input type="password" id="senha" maxlength="50" name="senha" value="" />

        <label for="senha2" >Confirme a senha: </label>
        <input type="password" id="senha2" maxlength="50" name="senha2" value="" />

        <center>
            <input type="submit" formaction="?acao=cadastrar" class="botao_cadastrar animacao" value="Salvar" />
        </center>
    </form>
</div>
