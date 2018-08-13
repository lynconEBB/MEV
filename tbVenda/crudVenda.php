<?php
    require_once '../conexao.php';
    class CrudV{
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
                $this->gerarVenda();
                break;
            case 3:
                $this->listaPorId();
                break;
            case 4:
                $this->alterar();
                break;
        }
    }
    function gerarVenda(){
        $produtos = $_POST["produtos"];
        $qtd = $_POST["Quantidade"];
        $idVenda = $_POST["idVenda"];
        $Total =0;
        if(!empty($produtos)){
            $len = count($produtos);
            for ($i=0; $i <$len ; $i++) { 
                $ProdPosPre=explode("-",$produtos[$i]);
                $idProd = $ProdPosPre[0];
                $Pos = $ProdPosPre[1];
                $Preco = floatval($ProdPosPre[2]);
                $Quantidade =floatval($qtd[$Pos]);
                $PrecoParcial=$Preco * $Quantidade; 
                $QtdEstoque =floatval($this->listaEstoquePorId($idProd));
                if($Quantidade>0 && $Quantidade<=$QtdEstoque){
                    $sql = "insert into tbItem (precoParcial,idProduto,idVenda,qtd) values ('".$PrecoParcial."','".$idProd."','".$idVenda."','".$Quantidade."')";
                    mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
                    $NewQtdEstoque = $QtdEstoque-$Quantidade;
                    $this->atualizaEstoque($idProd,$NewQtdEstoque);
                }else{
                    echo "Erro: Quantidade de Itens Invalida";
                    $this->excluir($idVenda);
                    echo "<a href='formEscolheCliente.php'>Clique para reiniciar a Venda</a>";
                    exit();
                }
                $Total+=$PrecoParcial;
            }
            $this->atualizaTotalVenda($idVenda,$Total);
        }else{
            echo "Erro: Quantidade de Produtos Invalida";
            $this->excluir($idVenda);
            echo "<a href='formEscolheCliente.php'>Clique para reiniciar a Venda</a>";
            exit();
        }
    }

    function listaEstoquePorId($id){
        $sql="select qtdestoque from tbproduto where idproduto =".$id;
        $query=mysqli_query($this->con, $sql);
        $array=mysqli_fetch_object($query);
        return $array->qtdestoque;
        
        
    }

    function inserir(){
        $sql = "insert into tbVenda (dtVenda,cartaoBand,cartaoNum,idCliente) values ('".$_REQUEST["dtVenda"]."','".$_REQUEST["cartaoBand"]."','".$_REQUEST["cartaoNum"]."','".$_REQUEST["idCliente"]."')";
        if (mysqli_query($this->con, $sql)) {
            $last_id = mysqli_insert_id($this->con);
            return $last_id;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }  
    }
    function atualizaEstoque($id,$Estoque){
        $sql="update tbproduto set qtdestoque='".$Estoque."' where idProduto='".$id."'"; 
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
    }

    function atualizaTotalVenda($id,$total){
        $sql="update tbvenda set Total='".$total."' where idVenda='".$id."'"; 
        mysqli_query($this->con, $sql) or die (mysqli_error($this->con));
    }

    function listarNotaFiscal(){
        $sql="select * from tbproduto";
        $query=mysqli_query($this->con, $sql);
        return $query; 
    }

    function listar(){
        $sql="select * from tbvenda";
        $query=mysqli_query($this->con, $sql);
        return $query; 
    }
    function excluir($id){
        $sql="delete from tbvenda where idvenda=".$id;
        $msg="Erro ao excluir o registr<hr>";
        mysqli_query($this->con, $sql)or die ($msg.mysqli_error($this->con));
    }

    function geraNotaFiscal(){
        $sql="select distinct preco, descricao, qtd, PrecoParcial, NomeCompleto,Total, dtVenda,cartaoBand,cartaoNum from tbproduto inner join tbitem on tbitem.idProduto = tbproduto.idProduto 
        inner join tbvenda on tbvenda.idVenda = tbitem.idVenda inner join tbpessoa on tbpessoa.idPessoa = tbvenda.idCliente where tbvenda.idVenda='".$_REQUEST["id"]."'";
        $query=mysqli_query($this->con, $sql);
        
        return $query; 
    }
    
}
new CrudV();
?>