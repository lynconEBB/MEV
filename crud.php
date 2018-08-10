<?php
require_once 'conexao.php';
class Crud{
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
       $sql="select * from tbcliente where idCliente=".$_REQUEST["id"] ;
       $query=mysqli_query($this->con, $sql);
       return $query;
   }
   function inserir(){
          //$id=$_REQUEST["id"];
		   //$sql="insert into tbCliente (idCliente, nome, endereco) values 
		   $sql="insert into tbCliente (nome, endereco) values
           ('".$_REQUEST["nome"]."','".$_REQUEST["endereco"]."')";
           mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
   }
   
   function listar(){
       $sql="select * from tbCliente";
       $query=mysqli_query($this->con, $sql);
       return $query; 
 
   }
   function excluir(){
       $sql="delete from tbCliente where idCliente=".$_REQUEST["id"];
       $msg="Erro ao excluir o registr<hr>";
       mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
       header("Location:relatorioGeral.php");
   }
   function alterar(){
       $sql="update tbCliente set nome='".$_POST["nome"]."', endereco='".$_POST["endereco"]."' where idCliente ='".$_POST["id"]."'";        
       mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
       header("Location:relatorioGeral.php");
       
   }
}
new Crud();