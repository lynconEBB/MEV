<?php
  require_once 'crudProduto.php';
  $obj=new Crud();
  $query=$obj->listar();
  $num=mysqli_num_rows($query);

    if($num>0){
        echo "<table border=1>";
        echo "<tr>
                <td colspan=4><a href='formCadastroProduto.php'> CADASTRAR PRODUTO</a></td>
              </tr>";
        echo "<tr>
                <td> Codigo </td>
                <td> Nome do Produto </td>
                <td> Descrição </td>
                <td> Qtd. Estoque </td>
                <td> Preço </td>
                <td> Edição </td>
            </tr>";
            while($array=mysqli_fetch_object($query)){
              echo "<tr>";
                echo "<td>".$array->id_Produto."</td>";
                echo "<td>".$array->Nome."</td>";
                echo "<td>".$array->Descricao."</td>";
                echo "<td>".$array->QtdEstoque."</td>";
                echo "<td>".$array->Preco."</td>";
                echo "<td>
                        <a href='formAlterarProduto.php?id=".$array->id_Produto."'>Alterar</a> | <a href='crudProduto.php?acao=2&id=".$array->id_Produto."'>Excluir</a>
                      </td> 
              </tr>";
            }
        echo "<table>";
        echo "<hr>  ".$num." registros de Produtos";
  }else{
      echo "Não há registros no banco de dados";
  }
?>