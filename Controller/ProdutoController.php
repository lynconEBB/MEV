<?php
require_once "../Model/Produto.php";
require_once "../DAO/ProdutoDAO.php";

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
               $dao = new ProdutoDAO();
               $dao->excluir($_GET[id]);
               break;
           case 3:
               $produto = new Produto();
               $produto->setDescricao($_POST["descricao"]);
               $produto->setPreco($_POST["preco"]);
               $produto->setQrdestoque($_POST["qtdestoque"]);
               $produto->setIdProduto($_POST["idProduto"]);

               $dao = new ProdutoDAO();
               $dao->alterar($produto);
               break;
       }
   }
}
new ProdutoController();