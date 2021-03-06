<?php

class controle_acesso {

    private $query;
    private $email;
    private $login;
    private $senha;
    private $msg = "";
    private $logado = 0;
    private $nivel;
    private $registro_tabela;
    private static $instance;

    protected function __construct() {
        //Thou shalt not construct that which is unconstructable!
    }

    static function getObject() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function validandoLogin() {
        $this->msg = "";
        
        if (empty($this->login) || empty($this->senha)) {
            $this->msg = "Preencha todos os campos!";
        } else {
            $this->query = mysql_query("SELECT * FROM usuario WHERE login = '$this->login' AND senha = '$this->senha' LIMIT 1");
            if (mysql_num_rows($this->query) == 1) {
                $this->registro_tabela = mysql_fetch_array($this->query);
                $this->nivel = $this->registro_tabela["nivel"];
                $this->logado = 1;
            } else {
                $this->msg = "Usuário ou Senha incorreta!";
            }
        }
    }

    private function usuarioExistente($num) {
        if ($num == 0) {
            $this->query = mysql_query("INSERT INTO usuario (email, login, senha, nivel) VALUES ('$this->email', '$this->login', '$this->senha', 0)");
            if (!(isset($this->query))) {
                $this->msg = "Usuario não cadastrado";
            } else {
                $this->msg = "Usuario cadastrado";
            }
        } else {
            $this->msg = "Usuário já cadastrado!";
        }
    }

    public function salvandoLogin() {
        $this->msg = "";

        if (empty($this->email) || empty($this->login) || empty($this->senha)) {
            $this->msg = "Preencha todos os campos!";
        } else {
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->query = mysql_query("SELECT * FROM usuario WHERE login = '$this->login'");
                $this->usuarioExistente(mysql_num_rows($this->query));
            } else {
                $this->msg = "Digite o seu email corretamente";
            }
        }
    }

    public function getRegistro_tabela() {
        return $this->registro_tabela;
    }

    public function getMsg() {
        return $this->msg;
    }
    
    function setEmail($email) {
        $this->email = $email;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }
    
    function getLogado() {
        return $this->logado;
    }

    function getNivel() {
        return $this->nivel;
    }

}
