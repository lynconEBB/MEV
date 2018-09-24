<?php
require_once "../Model/Produto.php"; require_once "../DAO/ProdutoDAO.php";
class ProdutoController{
   function __construct(){
       if(isset($_REQUEST["acao"])){
           $acao=$_REQUEST["acao"];
           $this->verificaAcao($acao);
       }
   }
   function verificaAcao($acao){
       switch ($acao){
           case 1:
               $produto = new Produto();
               $produto->setDescricao($_POST["descricao"]);
               $produto->setPreco($_POST["preco"]);
               $produto->setQrdestoque($_POST["qtdestoque"]);

               $dao = new ProdutoDAO();
               $dao->inserir($produto);
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
new ProdutoController();