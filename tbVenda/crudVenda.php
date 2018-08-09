<?php
  require_once "../conexao.php";
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
      $sql="select * from tbVenda where id_Venda=".$_REQUEST["id"] ;
      $query=mysqli_query($this->con, $sql);
      return $query;
    }

    function inserir(){
  		$sql=" insert into tbVenda(DataCompra, BandeiraCartao, NumeroCartao, Quantidade, Total, id_Cliente) values ('".$_REQUEST["CAMPO_DATA"]."','".$_REQUEST["CAMPO_BANDEIRA"]."','".$_REQUEST["CAMPO_NUMERO"]."','".$_REQUEST["CAMPO_QTD"]."','".$_REQUEST["CAMPO_TOTAL"]."','".$_REQUEST["CAMPO_ID"]."')";
      mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
      header("Location:relatorioGeralVenda.php");
    }
     
    function listar(){
      $sql="select * from tbVenda";
      $query=mysqli_query($this->con, $sql);
      return $query; 
    }

    function excluir(){
      $sql="delete from tbVenda where id_Venda=".$_REQUEST["id"];
      $msg="Erro ao excluir o registro<hr>";
      mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
      header("Location:relatorioGeralVenda.php");
    }

    function alterar(){
      $sql="update tbVenda set DataCompra='".$_POST["CAMPO_DATA"]."', BandeiraCartao='".$_POST["CAMPO_BANDEIRA"]."', NumeroCartao='".$_POST["CAMPO_NUMERO"]."', Quantidade='".$_POST["CAMPO_QTD"]."', Total='".$_POST["CAMPO_TOTAL"]."' , id_Cliente='".$_POST["CAMPO_ID"]."'where id_Venda ='".$_POST["id"]."'";        
      mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
      header("Location:relatorioGeralVenda.php");   
    }
  }
new Crud();