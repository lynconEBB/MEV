<?php

class Item{
    private $idItem;
    private $precoParcial;
    private $idProduto;
    private $idvenda;
    private $qtd;

    public function getIdItem()
    {
        return $this->idItem;
    }

    public function setIdItem($idItem)
    {
        $this->idItem = $idItem;
    }

    public function getPrecoParcial()
    {
        return $this->precoParcial;
    }

    public function setPrecoParcial($precoParcial)
    {
        $this->precoParcial = $precoParcial;
    }

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    public function getIdvenda()
    {
        return $this->idvenda;
    }

    public function setIdvenda($idvenda)
    {
        $this->idvenda = $idvenda;
    }

    public function getQtd()
    {
        return $this->qtd;
    }

    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }

}