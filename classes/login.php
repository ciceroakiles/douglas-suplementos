<?php

class login {

    private $query;
    private $login;
    private $senha;
    private $msg = "";

    public function login($login, $senha) {
        $this->login = $login;
        $this->senha = $senha;
    }

    public function verificaConteudo() {
        if (empty($this->login) && empty($this->senha)) {
            $this->msg = "Preencha todos os campos!";
            return true;
        }
        return false;
    }

    public function validandoAcesso() {
        $this->query = mysql_query("SELECT * FROM `usuario` WHERE login = '$this->login' AND senha = '$this->senha' LIMIT 1");

        if (mysql_num_rows($this->query) == 1) {
            $dados = mysql_fetch_array($this->query);

            if ($dados["status"] == '1') {
                $_SESSION ["login"] = $dados["login"];
                $_SESSION ["senha"] = $dados["senha"];
                $_SESSION ["nivel"] = $dados["nivel"];

                return true;
            } else {
                $this->msg = "Aguarde a nossa aprovação!";
                return false;
            }
        } else {
            $this->msg = "Usuário ou Senha incorreto!";
            return false;
        }
    }

    function getMsg() {
        return $this->msg;
    }
}
