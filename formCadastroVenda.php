<meta charset="utf-8">
<html>
   <head>
      <title>Nova Venda de produtos</title>
   </head>
   <body>
	  Nova Venda de produtos

    <br>
	Selecione o cliente para o qual a venda está sendo efetivada
	<br>
	</BODY>
</HTML>
<?php
  require_once 'crud.php';
  $obj=new Crud();
  $query=$obj->listar();
  $num=mysqli_num_rows($query);
  if($num>0){
      echo "<table border=1>";
      echo "<tr><td>id</td><td>Nome</td><td>Endereco</td><td>Ações</td></tr>";
      while($array=mysqli_fetch_object($query)){
		  echo "<td>".$array->idCliente."</td>";
          echo "<td>".$array->nome."</td>";
          echo "<td>".$array->endereco."</td>";
          echo "<td>
                 <a href='crudV.php?acao=1&id=".$array->idCliente."'>Seleciona</a>
               </td></tr>";
      }
      echo "<table>";
      echo "<hr> foram encontrados ".$num." registros";
  }else{
      echo "não há registros no banco de dados";
  }
?>
