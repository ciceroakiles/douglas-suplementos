<?php

class cadastro {

    private $query;
    private $email;
    private $login;
    private $senha;
    private $msg = "";

    function cadastro($email, $login, $senha) {
        $this->email = $email;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function verificaConteudo() {
        if (empty($this->login) || empty($this->senha) || empty($this->email)) {
            $this->msg = "Preencha todos os campos!";
            return false;
        }
        return true;
    }

    public function verificaEmail() {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->msg = "Digite o email corretamente!!";
            return false;
        }
    }

    public function salvando() {
        $this->query = mysql_query("SELECT * FROM usuario WHERE login = '$this->login'");
        $contar = mysql_num_rows($this->query);

        if ($contar == 0) {
            
            $this->senha = md5($this->senha);
            $insert = mysql_query("INSERT INTO usuario (email, login, senha, nivel, status) VALUES ('$this->email', '$this->login', '$this->senha', 0, 0)");

            if (isset($insert)) {
                $this->msg = "Usuario cadastrado";
            } else {
                $this->msg = "Usuario não cadastrado";
            }
        } else {
            $this->msg = "Usuário já cadastrado!";
        }
    }

    function getMsg() {
        return $this->msg;
    }

}
