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
        header("Location:../View/relatorioGeralPessoa.php");
    }
    function listar(){
        $sql="select * from tbPessoa";
        $query=mysqli_query($this->con, $sql);
        return $query;
    }

    function listaPorId(){
        $sql = "select * from tbPessoa where idPessoa=".$_REQUEST["id"] ;
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function alterar(Pessoa $pessoa){
        $sql="update tbPessoa set NomeCompleto='".$pessoa->getNomeCompleto()."', Cidade='".$pessoa->getCidade()."', Bairro='".$pessoa->getBairro()."', Rua='".$pessoa->getRua()."', Numero='".$pessoa->getNumero().
            "', CPF='".$pessoa->getCpf()."', Telefone='".$pessoa->getTelefone()."', Login='".$pessoa->getLogin()."', Email='".$pessoa->getEmail()."', TipoPessoa='".$pessoa->getTipoPessoa().
            "' where idPessoa ='".$pessoa->getIdPessoa()."'";
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
        header("Location:../View/relatorioGeralPessoa.php");
    }

    function excluir($idPessoa){
        $sql="delete from tbPessoa where idPessoa=".$_REQUEST["id"];
        $msg="Erro ao excluir o registro<hr>";
        mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
        header("Location:../View/relatorioGeralPessoa.php");
    }
/*
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
