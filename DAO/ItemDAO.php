<?php
require_once "../Model/Item.php";
require_once "conexao.php";
class ItemDAO{
    private $con;
    function __construct(){
        $this->con = Conexao::conectar();
    }

    function inserir(Item $item){
        $sql = "insert into tbItem (precoParcial,idProduto,idVenda,qtd) values ('".$item->getPrecoParcial()."','".$item->getIdProduto()."','".$item->getVenda()."','".$item->getQtd()."')";
        mysqli_query($this->con, $sql)or die (mysqli_error($this->con));
    }

    function excluirPorIdVenda($idVenda){
        $sql="delete from tbItem where idVenda=".$idVenda;
        $msg="Erro ao excluir o registro<hr>";
        mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
    }
}