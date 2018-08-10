<meta charset="utf-8">
<HTML>
  <HEAD>
    <TITLE>Gerenciando Vendas</TITLE>
  </HEAD>
  <BODY>
	Preencha os campos abaixo
	<form action="crudV_new.php" method="post" enctype="multipart/form-data"> 
    Data Venda: <INPUT type=DATE  name= DtVenda>
	<BR> Bandeira Cartão:  <INPUT type=TEXT  name= BandCartao>
    <BR> Número do Cartao: <INPUT type=TEXT  name= NCartao>
	<BR> Codigo do Cliente: <INPUT type=INT  name= idcliente>
	<BR> Codigo do Produto: <INPUT type=INT  name= idProduto>
	<BR> Preco: <INPUT type=INT  name= preco>
	<BR> Quantidade: <INPUT type=INT  name= qtd>
	<input type="hidden" name="acao" value="5">
    <input type="submit" value="Comprar">
    <BR>
    </FORM>
  </BODY>
</HTML>
<?php
  require_once 'crud.php';
  require_once 'crudPro.php';  
  $obj=new Crud();
  $query=$obj->listar();
  $num=mysqli_num_rows($query);
  if($num>0){
      echo "<table border=1>";
      echo "<tr><td>id</td><td>Nome</td><td>Endereco</td></tr>";
      while($array=mysqli_fetch_object($query)){
		  echo "<td>".$array->idCliente."</td>";
          echo "<td>".$array->nome."</td>";
          echo "<td>".$array->endereco."</td>";
          echo "</tr>";
      }
      echo "<table>";
      echo "<hr> foram encontrados ".$num." registros";
  }else{
      echo "não há registros no banco de dados";
  }
  require_once 'crudPro.php';  
  $obj=new Crudp();
  $query= $obj->listar();
  $num=mysqli_num_rows($query);
  if($num>0){
      echo "<table border=1>";
      echo "<tr><td>id</td><td>Descrição</td><td>Preço</td><td>Qtd em Estoque</tr>";
      while($array=mysqli_fetch_object($query)){
		  echo "<td>".$array->idProduto."</td>";
          echo "<td>".$array->descricao."</td>";
          echo "<td>".$array->preco."</td>";
		  echo "<td>".$array->qtdestoque."</td>";
          echo "</tr>";
      }
      echo "<table>";
      echo "<hr> foram encontrados ".$num." registros";
  }else{
      echo "não há registros no banco de dados";
  }
  
?>
