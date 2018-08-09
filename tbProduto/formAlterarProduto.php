<?php 
   require_once 'crudProduto.php';
   $obj=new Crud();
   $query=$obj->listaPorId($_REQUEST["id"]);
   $produto=mysqli_fetch_object($query);
?>
<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro de Produto - Alteração </title>
   </head>
   <body>	
      Cadastro de Produto - Alteração
      <form action="crudProduto.php" method="post">

         <br> Nome do Produto:  <input type=TEXT  name= CAMPO_NOME value = "<?php echo $produto->Nome; ?>">
         <br> Descrição: <input type=TEXT  name= CAMPO_DESCRICAO value = "<?php echo $produto->Descricao; ?>">
         <br> Qtd. Estoque: <input type=TEXT  name= CAMPO_QTDESTOQUE value = "<?php echo $produto->QtdEstoque; ?>">
         <br> Preço: <input type=TEXT  name= CAMPO_PRECO value = "<?php echo $produto->Preco; ?>">
         

         <input type="hidden" name="acao" value="4">
         <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>