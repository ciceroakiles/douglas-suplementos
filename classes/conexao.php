<?php

class conexao {
    private $host;
    private $user;
    private $pass;
    private $bd;

    function conexao() {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
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
