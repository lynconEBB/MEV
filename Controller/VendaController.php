<?php
    require_once '../DAO/VendaDAO.php';
    require_once '../Model/Venda.php';
    require_once 'ItemController.php';
    require_once 'ProdutoController.php';
    require_once 'PessoaController.php';

    class VendaController{
        private $vendaDAO;

        function __construct(){
            $this -> vendaDAO = new VendaDAO();

            if(isset($_REQUEST["escolha"])){
                $acao=$_REQUEST["escolha"];
                $this->verificaAcao($acao);
            }
        }

        function verificaAcao($acao){
            switch ($acao){
                case 1:
                    $this->inserir();
                    break;
            }
        }

        function excluir($id){
            $this->vendaDAO->excluir($id);
        }

        function inserir(){
            $venda = new Venda();
            $venda->setDtVenda($_POST["dtVenda"]);
            $venda->setCartaoBand($_POST["cartaoBand"]);
            $venda->setIdCliente($_POST["idPessoa"]);
            $venda ->setCartaoNum($_POST["cartaoNum"]);
            $total = $this ->gerarTotal($_POST["pos"],$_POST["Quantidade"],$_POST["preco"]);
            $venda -> setTotal($total);
            $idVenda = $this ->vendaDAO ->inserir($venda);
            $itemControl = new ItemController();
            if($itemControl -> inserir($_POST["pos"],$_POST["Quantidade"],$idVenda,$_POST["preco"],$_POST["qtdestoque"],$_POST["idProduto"])){
                header("Location:../View/MenuGeral.php");
            }else{
                echo "Erro no processo de Insercao da Venda";
                $this ->excluir($idVenda);
            }
        }

        function gerarTotal($pos,$qtds,$preco){
            $total = 0.0;

            foreach ($pos as $po){
                $precoParcial = $preco[$po] * $qtds[$po];
                $total += $precoParcial;
            }
            return $total;
        }

        function listar(){
            return $this -> vendaDAO -> listar();
        }

        function listarPorId($id){
            $itemControl = new ItemController();
            $itens = $itemControl->listarPorIdVenda($id);

            $produtoControl = new ProdutoController();
            $produtos= array();

            foreach ($itens as $item){
                $produto = $produtoControl -> listarPorIdItem($item->getIdItem());
                $produtos[] = $produto;
            }

            $pessoaControl = new PessoaController();
            $cliente = $pessoaControl ->listarPorIdVenda($id);

            $venda = $this ->vendaDAO->listarPorId($id);

            return array($itens,$produtos,$cliente,$venda);

        }

        function listarPorCliente($id){
            $vendas = $this-> vendaDAO ->listarPorCliente($id);
            $lista_vendas = array();
            foreach ($vendas as $venda){
                $itemControl = new ItemController();
                $itens = $itemControl->listarPorIdVenda($venda->getIdVenda());

                $produtoControl = new ProdutoController();
                $produtos= array();

                foreach ($itens as $item){
                    $produto = $produtoControl -> listarPorIdItem($item->getIdItem());
                    $produtos[] = $produto;
                }

                $pessoaControl = new PessoaController();
                $cliente = $pessoaControl ->listarPorId($id);

                $lista_vendas[] = [$venda,$itens,$produtos,$cliente];
            }

            return $lista_vendas;

        }

    }
new VendaController();
?>