<?php
require_once '../conexao.php';
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
            $sql="select * from tbPessoa where idPessoa=".$_REQUEST["id"] ;
            $query=mysqli_query($this->con, $sql);
            return $query;
        }
        function inserir(){
            $sql="insert into tbPessoa (NomeCompleto, Cidade,Bairro,Rua,Numero,CPF,Telefone,Login,Senha,Email,TipoPessoa) values('".$_REQUEST["NomeCompleto"].
            "','".$_REQUEST["Cidade"]."','".$_REQUEST["Bairro"]."','".$_REQUEST["Rua"]."','".$_REQUEST["Numero"]."','".$_REQUEST["CPF"]."','".$_REQUEST["Telefone"]."','".$_REQUEST["Login"]
            ."','".$_REQUEST["Senha"]."','".$_REQUEST["Email"]."','".$_REQUEST["TipoPessoa"]."')";
            mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
            header("Location:relatorioGeral.php");
        }
    
    function listar(){
        $sql="select * from tbPessoa";
        $query=mysqli_query($this->con, $sql);
        return $query; 
    
    }
    function excluir(){
        $sql="delete from tbPessoa where idPessoa=".$_REQUEST["id"];
        $msg="Erro ao excluir o registro<hr>";
        mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
        header("Location:relatorioGeral.php");
    }
   function alterar(){
        $sql="update tbPessoa set NomeCompleto='".$_POST["NomeCompleto"]."', Cidade='".$_POST["Cidade"]."', Bairro='".$_POST["Bairro"]."', Rua='".$_POST["Rua"]."', Numero='".$_POST["Numero"].
        "', CPF='".$_POST["CPF"]."', Telefone='".$_POST["Telefone"]."', Login='".$_POST["Login"]."', Email='".$_POST["Email"]."', TipoPessoa='".$_POST["TipoPessoa"].
        "' where idPessoa ='".$_POST["idPessoa"]."'";        
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
        header("Location:relatorioGeral.php");
    }

   function consultar($login,$senha){
        $sql="select * from tbPessoa where Login='".$login."' and Senha='".$senha."'";
        $query=mysqli_query($this->con, $sql);
        if($query!= false){
            $num=mysqli_num_rows($query) ;
        }else{
            $num=0;
        }
        if($num>0){
            return true; 
        }else{
            return false;
        }
    }
}
new Crud();
?>