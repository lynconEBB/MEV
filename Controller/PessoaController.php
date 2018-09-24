<?php
require_once "../Model/Pessoa.php"; require_once "../DAO/PessoaDAO.php";
class PessoaController{
    function __construct(){
        if(isset($_REQUEST["acao"])){
            $acao=$_REQUEST["acao"];
            $this->verificaAcao($acao);
        }
    }
    function verificaAcao($acao){
        switch ($acao){
            case 1:
                $pessoa = new Pessoa();
                $pessoa->setNomeCompleto($_POST["NomeCompleto"]);
                $pessoa->setBairro($_POST["Bairro"]);
                $pessoa->setCidade($_POST["Cidade"]);
                $pessoa->setRua($_POST["Rua"]);
                $pessoa->setNumero($_POST["Numero"]);
                $pessoa->setCpf($_POST["CPF"]);
                $pessoa->setTelefone($_POST["Telefone"]);
                $pessoa->setLogin($_POST["Login"]);
                $pessoa->setSenha($_POST["Senha"]);
                $pessoa->setEmail($_POST["Email"]);
                $pessoa->setTipoPessoa($_POST["TipoPessoa"]);

                $dao = new PessoaDAO();
                $dao->inserir($pessoa);
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
}
new PessoaController();
?>