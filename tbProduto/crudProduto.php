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
      $sql="select * from tbProduto_Venda where id_Produto=".$_REQUEST["id"] ;
      $query=mysqli_query($this->con, $sql);
      return $query;
    }

    function inserir(){
  		$sql=" insert into tbProduto_Venda(Nome, Descricao, QtdEstoque, Preco) values ('".$_REQUEST["CAMPO_NOME"]."','".$_REQUEST["CAMPO_DESCRICAO"]."','".$_REQUEST["CAMPO_QTDESTOQUE"]."','".$_REQUEST["CAMPO_PRECO"]."')";
      mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
      header("Location:relatorioGeralProduto.php");
    }
     
    function listar(){
      $sql="select * from tbProduto_Venda";
      $query=mysqli_query($this->con, $sql);
      return $query; 
    }

    function excluir(){
      $sql="delete from tbProduto_Venda where id_Produto=".$_REQUEST["id"];
      $msg="Erro ao excluir o registro<hr>";
      mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
      header("Location:relatorioGeralProduto.php");
    }

    function alterar(){
      $sql="update tbProduto_Venda set Nome='".$_POST["CAMPO_NOME"]."', Descricao='".$_POST["CAMPO_DESCRICAO"]."', QtdEstoque='".$_POST["CAMPO_QTDESTOQUE"]."', Preco='".$_POST["CAMPO_PRECO"]."' where id_Produto ='".$_POST["id"]."'";        
      mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
      header("Location:relatorioGeralProduto.php");   
    }
  }
new Crud();