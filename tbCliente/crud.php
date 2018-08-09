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
      $sql="select * from tbCliente where id_Cliente=".$_REQUEST["id"] ;
      $query=mysqli_query($this->con, $sql);
      return $query;
    }

    function inserir(){
  		$sql=" insert into tbCliente(NomeCompleto, CPF, Cidade, Bairro, Rua, Numero, CEP, TelefoneFixo, Celular, Email) values ('".$_REQUEST["CAMPO_NOME"]."','".$_REQUEST["CAMPO_CPF"]."','".$_REQUEST["CAMPO_CIDADE"]."','".$_REQUEST["CAMPO_BAIRRO"]."','".$_REQUEST["CAMPO_RUA"]."','".$_REQUEST["CAMPO_NUMERO"]."','".$_REQUEST["CAMPO_CEP"]."','".$_REQUEST["CAMPO_TELEFONEFIXO"]."','".$_REQUEST["CAMPO_CELULAR"]."','".$_REQUEST["CAMPO_EMAIL"]."')";
      mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
      //header("Location:relatorioGeral.php");
    }
     
    function listar(){
      $sql="select * from tbCliente";
      $query=mysqli_query($this->con, $sql);
      return $query; 
    }

    function excluir(){
      $sql="delete from tbCliente where id_Cliente=".$_REQUEST["id"];
      $msg="Erro ao excluir o registro<hr>";
      mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
      header("Location:relatorioGeral.php");
    }

    function alterar(){
      $sql="update tbCliente set NomeCompleto='".$_POST["CAMPO_NOME"]."', CPF='".$_POST["CAMPO_CPF"]."', Cidade='".$_POST["CAMPO_CIDADE"]."', Bairro='".$_POST["CAMPO_BAIRRO"]."', Rua='".$_POST["CAMPO_RUA"]."', Numero='".$_POST["CAMPO_NUMERO"]."', TelefoneFixo='".$_POST["CAMPO_TELEFONEFIXO"]."', Celular='".$_POST["CAMPO_CELULAR"]."', Email='".$_POST["CAMPO_EMAIL"]."' where id_Cliente ='".$_POST["id"]."'";        
      mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
      header("Location:relatorioGeral.php");   
    }
  }
new Crud();