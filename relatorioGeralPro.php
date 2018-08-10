<?php
  require_once 'crudPro.php';
  $obj=new CrudP();
  $query= $obj->listar();
  $num=mysqli_num_rows($query);
  if($num>0){
      echo "<table border=1>";
      echo "<tr><td>id</td><td>Descrição</td><td>Preço</td><td>Quantidade Estoque</td><td>Ações</td></tr>";
      while($array=mysqli_fetch_object($query)){
		  echo "<td>".$array->idProduto."</td>";
          echo "<td>".$array->descricao."</td>";
          echo "<td>".$array->preco."</td>";
		  echo "<td>".$array->qtdestoque."</td>";
          echo "<td>
                 <a href='crudPro.php?acao=2&id=".$array->idProduto."'>Excluir</a>
                 |<a href='formAlterarPro.php?id=".$array->idProduto."'>Alterar</a> 
                 </td></tr>";
      }
      echo "<table>";
      echo "<hr> foram encontrados ".$num." registros";
  }else{
      echo "não há registros no banco de dados";
  }
?>