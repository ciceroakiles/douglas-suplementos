<?php

class produto {

    private $filtro = '';
    private $produto = '';
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

    function getFiltro() {
        return $this->filtro;
    }

    function setFiltro($filtro) {
        $this->filtro = $filtro;
    }

    function getProduto() {
        return $this->produto;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

}
