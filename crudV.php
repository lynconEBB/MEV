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
		   case 5:
               $this->alterarV();
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
           $cli = $_REQUEST["id"];
		   $sql= "INSERT INTO `tbvenda` (`numVenda`, `dtVenda`, `cartaoBand`, `cartaoNum`, `vlTotal`, `idCliente`) VALUES";
           $sql.= " ('', NULL, NULL, NULL, NULL, '".$cli."')";
           mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
		   header("Location:escolhePro.php"); 
		  
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
	   $sql="update tbproduto set descricao='".$_POST["descricao"]."', preco='".$_POST["preco"]."', qtdestoque='".$_POST["qtdestoque"]--."' where idProduto='".$_POST["id"]."'";        
       mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
       header("Location:relatorioGeralPro.php");
      
   }
   
    function alterarV(){
       $sql="update tbproduto set descricao='".$_POST["descricao"]."', preco='".$_POST["preco"]."', qtdestoque='".$_POST["qtdestoque"]."' where idProduto='".$_POST["id"]."'";        
       mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
       header("Location:relatorioGeralPro.php");
	   echo "Falta implementarrrrr";
       
   }
}
new Crud();