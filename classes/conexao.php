<?php

class conexao {

    private $host;
    private $user;
    private $pass;
    private $bd;

    function conexao($host, $user, $pass, $bd) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->bd = $bd;
    }

    private function selecionarBd() {
        $conexao = mysql_connect($this->host, $this->user, $this->pass);
        $selectdb = mysql_select_db($this->bd, $conexao);

        return $selectdb;
    }

    public function abrirConexão() {
        return $this->selecionarBd();

    }
    
    public function fecharConexão() {
        mysql_close();
    }

}
