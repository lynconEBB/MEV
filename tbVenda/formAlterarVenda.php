<?php 
   require_once 'crudVenda.php';
   $obj=new Crud();
   $query=$obj->listaPorId($_REQUEST["id"]);
   $venda=mysqli_fetch_object($query);
?>
<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro da Venda - Alteração </title>
   </head>
   <body>	
      Cadastro da Venda - Alteração
      <form action="crudVenda.php" method="post">

         <br> Data da Compra:  <input type=TEXT  name= CAMPO_DATA value = "<?php echo $venda->DataCompra; ?>">
         <br> Bandeira do Cartão: <input type=TEXT  name= CAMPO_BANDEIRA value = "<?php echo $veda->BandeiraCartao; ?>">
         <br> Número do Cartão: <input type=NUMBER  name= CAMPO_NUMERO value = "<?php echo $venda->NumeroCartao; ?>">
         <br> Quantidade: <input type=NUMBER  name= CAMPO_QTD value = "<?php echo $venda->Quantidade; ?>">
         <br> Total: <input type=NUMBER  name= CAMPO_TOTAL value = "<?php echo $venda->Total; ?>">
         <br> ID Cliente: <input type=TEXT  name= CAMPO_ID value = "<?php echo $venda->id_Cliente; ?>">
         

         <input type="hidden" name="acao" value="4">
         <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>