<?php
require_once "conexao.php";

class ProdutoDAO{
    private $con;
    function __construct(){
        $this->con = Conexao::conectar();
    }

    function inserir(Produto $produto){
        $sql="insert into tbproduto (descricao, preco, qtdestoque) values ('".$produto->getDescricao()."','".$produto->getPreco()."','".$produto->getQrdestoque()."')";
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
        header("location:../View/relatorioGeralProduto.php");
    }

    function listaPorId($id){
        $sql="select * from tbproduto where idproduto =".$id;
        $query=mysqli_query($this->con, $sql);
        return $query;
    }

    function listar(){
        $sql="select * from tbproduto";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    function excluir($id){
        $sql="delete from tbproduto where idproduto=".$id;
        $msg="Erro ao excluir o registro<hr>";
        mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
        header("Location:../View/relatorioGeralProduto.php");
    }

    function alterar(Produto $produto){
        $sql="update tbproduto set descricao='".$produto->getDescricao()."', preco='".$produto->getPreco()."', qtdestoque='".$produto->getQrdestoque()."' where idProduto='".$produto->getIdProduto()."'";
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
        header("Location:../View/menuProduto.php");

    }
}