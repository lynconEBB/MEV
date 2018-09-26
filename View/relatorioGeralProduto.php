<?php

require_once '../DAO/ProdutoDAO.php';
$obj = new ProdutoDAO();
$query = $obj->listar();
$num = mysqli_num_rows($query);
if($num>0){
    echo "<table border=1>";
    echo "<tr>";
    echo"<td>id</td>";
    echo"<td>Descrição</td>";
    echo"<td>Preço</td>";
    echo"<td>Quantidade Estoque</td>";
    echo"<td>Ações</td>";
    echo"</tr>";
    while($array=mysqli_fetch_object($query)){
        echo "<td>".$array->idProduto."</td>";
        echo "<td>".$array->descricao."</td>";
        echo "<td>".$array->preco."</td>";
        echo "<td>".$array->qtdestoque."</td>";
        echo "<td><a href='../Controller/ProdutoController.php?acao=2&id=".$array->idProduto."'>Excluir</a>";
        echo"|<a href='formAlterarProduto.php?id=".$array->idProduto."'>Alterar</a>";
        echo"</td></tr>";
    }
    echo "<table>";
    echo "<hr>Foram encontrados ".$num." registros";
}else{
    echo "não há registros no banco de dados";
}
