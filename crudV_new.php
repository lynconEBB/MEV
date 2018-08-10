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
       $cli = $_POST["idcliente"];
	   $totalV= $_POST["preco"] * $_POST["qtd"];
	   $sql= "INSERT INTO `tbvenda` (`numVenda`, `dtVenda`, `cartaoBand`, `cartaoNum`, `vlTotal`, `idCliente`) VALUES";
       $sql.= " ('','".$_POST["DtVenda"]."', '".$_POST["BandCartao"]."', '".$_POST["NCartao"]."','".$totalV."' , '".$cli."')";
	   mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
	   $teste = POST["DtVenda"];
	   eco   $teste." ";
	   eco   $cli;
	   $sql2=" SELECT * FROM `tbvenda` WHERE dtVenda = ".$_POST["DtVenda"]." AND idCliente = ".$cli.")";
       $query=mysqli_query($this->con, $sql2);
	   echo $query;
	   $num= mysqli_num_rows($query);
	   if($num>0){
			$array=mysqli_fetch_object($query);
		} else{
			echo "não há registros no banco de dados";
		}
	   $sql= "INSERT INTO `tbitemvenda` (`numVenda`, `numitem`, `qtd`) VALUES";
       $sql.= " ('".$_POST["idProduto"]."', '".$array->numVenda."', '".$_POST["qtd"]."')";
	   mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
	   
	   echo "Falta implementarrrrr";
       
   }
}
new Crud();