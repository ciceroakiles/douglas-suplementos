<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

/**
 * Description of SeleniumTest
 *
 * @author Akiles
 */
class SeleniumTest extends PHPUnit_Extensions_SeleniumTestCase {

    protected function setUp() {
        $this->setBrowser("*googlechrome");
        $this->setBrowserUrl("http://localhost/douglas_suplementos/index.php");
    }

    public function test() {
        // Teste de carregamento
        $this->open("http://localhost/douglas_suplementos/index.php");
        $this->waitForPageToLoad();
        $this->assertEquals('Vendas de suplemento', $this->getTitle());

        // Teste de busca (investigar strtoupper, strtolower)
        $search = "Fiat";
        $this->type("css=input#input_buscar_principal", $search);
        $this->click("css=input#input_botao_buscar");
        $this->assertContains($search, ($this->getText("css=h2.item_nome")));

        // Teste de login
        $login = "admin";
        $senha = "admin";
        $this->type("css=input#login.campos_login", $login);
        $this->type("css=input#senha.campos_login", $senha);
        $this->click("css=input#botao_entrar");
        $this->waitForPageToLoad();
        $this->assertContains('admin', $this->getText("css=div#logado"));
    }

}

?>