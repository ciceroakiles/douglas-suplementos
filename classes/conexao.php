<?php

class conexao {
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

    private function selecionarBd() {
        $conexao = mysql_connect("127.0.0.1:3306", "root", "senharoot");
        $selectdb = mysql_select_db("ds", $conexao);
        mysql_query("SET NAMES utf8", $conexao);

        return $selectdb;
    }

    public function abrirConexao() {
        return $this->selecionarBd();
    }
}
