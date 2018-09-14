<?php

class Venda{
    private $idVenda;
    private $dtVenda;
    private $cartaoBand;
    private $cartaoNum;
    private $Total;
    private $idCliente;

    public function getIdVenda()
    {
        return $this->idVenda;
    }

    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;
    }

    public function getDtVenda()
    {
        return $this->dtVenda;
    }

    public function setDtVenda($dtVenda)
    {
        $this->dtVenda = $dtVenda;
    }

    public function getCartaoBand()
    {
        return $this->cartaoBand;
    }

    public function setCartaoBand($cartaoBand)
    {
        $this->cartaoBand = $cartaoBand;
    }

    public function getCartaoNum()
    {
        return $this->cartaoNum;
    }

    public function setCartaoNum($cartaoNum)
    {
        $this->cartaoNum = $cartaoNum;
    }

    public function getTotal()
    {
        return $this->Total;
    }

    public function setTotal($Total)
    {
        $this->Total = $Total;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

}