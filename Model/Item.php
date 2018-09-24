<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/09/2018
 * Time: 14:09
 */

class Item{
    private $idItem;
    private $precoParcial;
    private $ifProduto;
    private $venda;
    private $qtd;

    public function getIdItem()
    {
        return $this->idItem;
    }

    public function setIdItem($idItem): void
    {
        $this->idItem = $idItem;
    }

    public function getPrecoParcial()
    {
        return $this->precoParcial;
    }

    public function setPrecoParcial($precoParcial): void
    {
        $this->precoParcial = $precoParcial;
    }

    public function getIfProduto()
    {
        return $this->ifProduto;
    }

    public function setIfProduto($ifProduto): void
    {
        $this->ifProduto = $ifProduto;
    }

    public function getVenda()
    {
        return $this->venda;
    }

    public function setVenda($venda): void
    {
        $this->venda = $venda;
    }

    public function getQtd()
    {
        return $this->qtd;
    }

    public function setQtd($qtd): void
    {
        $this->qtd = $qtd;
    }


}