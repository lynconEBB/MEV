<?php
require_once '../conexao.php';
class CrudP{
   private $con;
   function __construct(){
       $this->con=Conexao::conectar();
       if(isset($_REQUEST["acao"])){
           $acao=$_REQUEST["acao"];
           $this->verificaAcao($acao);
       }
   }
   function verificaAcao($acao){
       switch ($acao){
           case 1:
               $this->inserir();
               break;
           case 2:
               $this->excluir();
               break;
           case 3:
               $this->listaPorId();
               break;
           case 4:
               $this->alterar();
               break;
       }
   }

   function listaPorId(){
       $id=$_REQUEST["id"];
       $sql="select * from tbproduto where idproduto =".$id;
       $query=mysqli_query($this->con, $sql);
       return $query;
   }
   function inserir(){
            $sql="insert into tbproduto (descricao, preco, qtdestoque) values 
           ('".$_REQUEST["descricao"]."','".$_REQUEST["preco"]."','".$_REQUEST["qtdestoque"]."')";
           mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
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
       
   }
}
new CrudP();