<?php
require_once "../Model/Venda.php";
require_once "conexao.php";

class VendaDAO{
    private $con;

    function __construct(){
        $this->con = Conexao::conectar();
    }

    function inserir(Venda $venda){
        $sql = "insert into tbVenda (dtVenda,cartaoBand,cartaoNum,idCliente,Total) values ('".$venda->getDtVenda()."','".$venda->getCartaoBand().
            "','".$venda->getCartaoNum()."','".$venda->getIdCliente()."','".$venda->getTotal()."')";
        if (mysqli_query($this->con, $sql)) {
            $last_id = mysqli_insert_id($this->con);
            return $last_id;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
    }


    /*
    function listarNotaFiscal(){
        $sql="select * from tbproduto";
        $query=mysqli_query($this->con, $sql);
        return $query;
    }

    function listar(){
        $sql="select * from tbvenda";
        $query=mysqli_query($this->con, $sql);
        return $query;
    }


    function geraNotaFiscal(){
        $sql="select distinct preco, descricao, qtd, PrecoParcial, NomeCompleto,Total, dtVenda,cartaoBand,cartaoNum from tbproduto inner join tbitem on tbitem.idProduto = tbproduto.idProduto 
        inner join tbvenda on tbvenda.idVenda = tbitem.idVenda inner join tbpessoa on tbpessoa.idPessoa = tbvenda.idCliente where tbvenda.idVenda='".$_REQUEST["id"]."'";
        $query=mysqli_query($this->con, $sql);

        return $query;
    }*/
}