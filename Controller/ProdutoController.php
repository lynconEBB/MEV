<?php
require_once "../Model/Produto.php";
require_once "../DAO/ProdutoDAO.php";

class ProdutoController{
    private $produtoDAO;

    function __construct(){
        $this->produtoDAO = new ProdutoDAO();

        if(isset($_REQUEST["acao"])){
            $acao=$_REQUEST["acao"];
            $this->verificaAcao($acao);
        }
    }

   function verificaAcao($acao){
        switch ($acao){
            case 1:
                $this -> inserir();
                break;
            case 2:
                $this -> excluir();
                break;
            case 3:
                $this -> alterar();
                break;
       }
   }

   function listar(){
        return $this -> produtoDAO -> listar();
   }

   function listarPorId($id){
        return $this -> produtoDAO ->listarPorId($id);
   }

   function listarPorIdItem($idItem){
        return $this -> produtoDAO ->listarPorIdItem($idItem);
   }

   function inserir(){
       $produto = new Produto();
       $produto->setDescricao($_POST["descricao"]);
       $produto->setPreco($_POST["preco"]);
       $produto->setQrdestoque($_POST["qtdestoque"]);

       if($this -> produtoDAO -> inserir($produto)){
           header("location:../View/listarProduto.php");
       }
   }

   function alterar(){
       $produto = new Produto();
       $produto->setDescricao($_POST["descricao"]);
       $produto->setPreco($_POST["preco"]);
       $produto->setQrdestoque($_POST["qtdestoque"]);
       $produto->setIdProduto($_POST["idProduto"]);

       if($this -> produtoDAO -> alterar($produto)){
           header("Location:../View/listarProduto.php");
       }
   }

   function excluir(){
        if($this -> produtoDAO -> excluir($_GET["id"])){
            header("Location:../View/listarProduto.php");
        }
   }

   function atualizaEstoque($idProduto,$qtd){
        $this -> produtoDAO -> atualizaEstoque($idProduto,$qtd);
   }
}
new ProdutoController();