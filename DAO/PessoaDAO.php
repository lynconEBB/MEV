<?php
require_once "conexao.php";
class PessoaDAO{
    private $con;
    function __construct(){
            $this->con=Conexao::conectar();

    }
    function inserir(Pessoa $pessoa){
        $sql="insert into tbPessoa (NomeCompleto, Cidade,Bairro,Rua,Numero,CPF,Telefone,Login,Senha,Email,TipoPessoa) values('".$pessoa->getNomeCompleto()."','".$pessoa->getCidade()."','".$pessoa->getBairro()."','".$pessoa->getRua()."','".$pessoa->getNumero()."','".$pessoa->getCpf()."','".$pessoa->getTelefone()."','".$pessoa->getLogin()
            ."','".$pessoa->getSenha()."','".$pessoa->getEmail()."','".$pessoa->getTipoPessoa()."')";
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
        header("Location:../View/formCadastroPessoa.php");
    }
    function listar(){
        $sql="select * from tbPessoa";
        $query=mysqli_query($this->con, $sql);
        return $query;
    }

    /*function listaPorId(){
        $sql="select * from tbPessoa where idPessoa=".$_REQUEST["id"] ;
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
    }*/
}

?>
