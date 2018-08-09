<?php
  require_once 'crudVenda.php';
  $obj=new Crud();
  $query=$obj->listar();
  $num=mysqli_num_rows($query);

    if($num>0){
        echo "<table border=1>";
        echo "<tr>
                <td colspan=4><a href='formCadastroVenda.php'> CADASTRAR VENDA </a></td>
              </tr>";
        echo "<tr>
                <td> Codigo </td>
                <td> Data da Compra </td>
                <td> Bandeira do Cartão </td>
                <td> Número do Cartão </td>
                <td> Quantidade </td>
                <td> Total </td>
                <td> ID Cliente </td>
                <td> Edição </td>
            </tr>";
            while($array=mysqli_fetch_object($query)){
              echo "<tr>";
                echo "<td>".$array->id_Venda."</td>";
                echo "<td>".$array->DataCompra."</td>";
                echo "<td>".$array->BandeiraCartao."</td>";
                echo "<td>".$array->NumeroCartao."</td>";
                echo "<td>".$array->Quantidade."</td>";
                echo "<td>".$array->Total."</td>";
                echo "<td>".$array->id_Cliente."</td>";
                echo "<td>
                        <a href='formAlterarVenda.php?id=".$array->id_Venda."'>Alterar</a> | <a href='crudVenda.php?acao=2&id=".$array->id_Venda."'>Excluir</a>
                      </td> 
              </tr>";
            }
        echo "<table>";
        echo "<hr>  ".$num." registros de Vendas";
  }else{
      echo "Não há registros no banco de dados";
  }
?>