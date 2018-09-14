<?php

class Produto{
    private $idProduto;
    private $descricao;
    private $preco;
    private $qtdEstoque;

    public function getIdProduto(){
        return $this->idProduto;
    }

    public function setIdProduto($idProduto){
        $this->idProduto = $idProduto;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getQtdEstoque(){
        return $this->qtdEstoque;
    }

    public function setQtdEstoque($qtdEstoque){
        $this->qtdEstoque = $qtdEstoque;
    }

}