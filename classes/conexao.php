<?php

class conexao {
    private $host;
    private $user;
    private $pass;
    private $bd;

    function conexao() {
        $this->host = "127.0.0.1:3306";
        $this->user = "root";
        $this->pass = "senharoot";
        $this->bd = "ds";
    }

    private function selecionarBd() {
        $conexao = mysql_connect($this->host, $this->user, $this->pass);
        $selectdb = mysql_select_db($this->bd, $conexao);
        mysql_query("SET NAMES utf8", $conexao);

        return $selectdb;
    }

    public function abrirConexao() {
        return $this->selecionarBd();
    }
}
