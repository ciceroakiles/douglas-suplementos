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
    
    function carregaPagina() {
        // Teste de carregamento (principal)
        $this->open("http://localhost/douglas_suplementos/index.php");
        $this->waitForPageToLoad();
        $this->assertEquals('Vendas de suplemento', $this->getTitle());
    }
    
    function buscaItem() {
        // Teste de busca
        $search = "Fiat";
        $this->type("css=input#input_buscar_principal", $search);
        $this->click("css=input#input_botao_buscar");
        $this->assertContains($search, ($this->getText("css=h2.item_nome")));
    }

    function login() {
        // Teste de login
        $login = "admin";
        $senha = "admin";
        $this->type("css=input#login.campos_login", $login);
        $this->type("css=input#senha.campos_login", $senha);
        $this->click("css=input#botao_entrar");
        $this->waitForPageToLoad();
        $this->assertContains('admin', $this->getText("css=div#logado"));
    }
    
    function carregaProdutos() {
        // Teste de carregamento (produtos)
        $this->open("http://localhost/douglas_suplementos/templates/pagina_produto.php");
        $this->waitForPageToLoad();
        $this->assertEquals('Listando produtos', $this->getText("css=h2.produtos_cabecalho"));
    }
    
    function novoProduto() {
        // Teste de criação de produto
        $nome = "Teste";
        $modelo = "Modelo";
        $categ = "Categoria";
        $qtde = "2";
        $desc = "Descrição";
        $valor = "100";
        $this->type("css=input#nome", $nome);
        $this->type("css=input#modelo", $modelo);
        $this->type("css=input#categoria", $categ);
        $this->type("css=input#quant", $qtde);
        $this->type("css=textarea.descricao", $desc);
        $this->type("css=input#valor", $valor);
        $this->click("css=input#botao_salvar_produto");
        $this->waitForPageToLoad();
        $this->assertContains($nome, $this->getText("css=tr.linha_produtos"));
        $this->assertContains($qtde, $this->getText("css=tr.linha_produtos"));
        $this->assertContains($valor, $this->getText("css=tr.linha_produtos"));
    }
    
    function alterarProduto() {
        // Teste de alteração de produto
        $nome = "Teste 2";
        $modelo = "Modelo 2";
        $categ = "Categoria 2";
        $qtde = "3";
        $desc = "Descrição 2";
        $valor = "200";
        $this->click("css=a#item");
        $this->type("css=input#nome", "");
        $this->type("css=input#nome", $nome);
        $this->type("css=input#modelo", "");
        $this->type("css=input#modelo", $modelo);
        $this->type("css=input#categoria", "");
        $this->type("css=input#categoria", $categ);
        $this->type("css=input#quant", "");
        $this->type("css=input#quant", $qtde);
        $this->type("css=textarea.descricao", "");
        $this->type("css=textarea.descricao", $desc);
        $this->type("css=input#valor", "");
        $this->type("css=input#valor", $valor);
        $this->click("css=input#botao_alterar_produto.botao_salvar_produto");
        $this->waitForPageToLoad();
        $this->assertContains($nome, $this->getText("css=tr.linha_produtos"));
        $this->assertContains($qtde, $this->getText("css=tr.linha_produtos"));
        $this->assertContains($valor, $this->getText("css=tr.linha_produtos"));
    }
    
    function excluirProduto() {
        // Teste de deleção de produto
        $nome = "Teste 2";
        $this->click("css=a#item");
        $this->assertContains($nome, $this->getText("css=tr.linha_produtos"));
        $this->click("css=input#botao_deletar_produto.botao_salvar_produto");
        $this->waitForPageToLoad();
        $this->assertNotEquals($nome, $this->getText("css=tr.linha_produtos"));
    }
    
    function carregaUsuarios() {
        // Teste de carregamento (usuários)
        $this->open("http://localhost/douglas_suplementos/templates/pagina_usuario.php");
        $this->waitForPageToLoad();
        
    }
    
    public function test() {
        $this->carregaPagina();
        $this->login();
        $this->carregaUsuarios();
    }
    
}

?>