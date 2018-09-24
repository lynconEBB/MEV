<?php
require_once "conexao.php";
class ProdutoDAO{
    private $con;
    function __construct()
    {
        $this->con = Conexao::conectar();
    }
    function inserir(Produto $produto){
        $sql="insert into tbproduto (descricao, preco, qtdestoque) values 
           ('".$produto->getDescricao()."','".$produto->getPreco()."','".$produto->getQrdestoque()."')";
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
    }
    /*function listaPorId(){
        $id=$_REQUEST["id"];
        $sql="select * from tbproduto where idproduto =".$id;
        $query=mysqli_query($this->con, $sql);
        return $query;
    }

    function listar(){
        $sql="select * from tbproduto";
        $query=mysqli_query($this->con, $sql);
        return $query;

    }
    function excluir(){
        $sql="delete from tbproduto where idproduto=".$_REQUEST["id"];
        $msg="Erro ao excluir o registr<hr>";
        mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
        header("Location:relatorioGeralPro.php");
    }
    function alterar(){
        $sql="update tbproduto set descricao='".$_POST["descricao"]."', preco='".$_POST["preco"]."', qtdestoque='".$_POST["qtdestoque"]."' where idProduto='".$_POST["id"]."'";
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
        header("Location:relatorioGeralPro.php");

    }*/
}

?>