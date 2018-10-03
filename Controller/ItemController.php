<?php
require_once "../Model/Item.php";
require_once "../DAO/ItemDAO.php";
require_once "ProdutoController.php";
require_once "VendaController.php";

class ItemController{
    private $itemDAO;

    function __construct(){
        $this->itemDAO = new ItemDAO();
    }

    function inserir($pos,$qtds,$idVenda,$precos,$estoques,$idsProduto){
        $produtoControl = new ProdutoController();
        $volta = true;
        if(!empty($pos)){
            foreach ($pos as $po) {
                $item = new Item();
                $item->setIdProduto($idsProduto[$po]);
                $item->setQtd($qtds[$po]);
                $item ->setPrecoParcial($precos[$po] * $qtds[$po]);
                $item ->setVenda($idVenda);

                if($item->getQtd() > 0 && $item->getQtd() <= $estoques[$po]){
                    if(!$this -> itemDAO -> inserir($item)){
                        $volta=false;
                    }
                    $NewQtdEstoque = $estoques[$po] - $item->getQtd();
                    $produtoControl->atualizaEstoque($item->getIdProduto(),$NewQtdEstoque);
                }else{
                    echo "Erro: Quantidade de Itens Invalida<br>";
                    $this -> itemDAO ->excluirPorIdVenda($idVenda);
                    echo "<a href='../View/formEscolheVendaPorID.php'>Clique para reiniciar a Venda</a>";
                    $volta = false;
                }

            }
        }else{
            echo "Erro: Quantidade de Produtos Invalida";
            echo "<a href='../View/formEscolheVendaPorID.php'>Clique para reiniciar a Venda</a>";
            exit();
        }
        return $volta;
    }

    function listarPorIdVenda($idVenda){
        return $this -> itemDAO -> listarPorIdVenda($idVenda);
    }
}