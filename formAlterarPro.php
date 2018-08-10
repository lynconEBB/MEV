<?php 
   require_once 'crudPro.php';
   $obj=new Crud();
   $query=$obj->listaPorId($_REQUEST["id"]);
   $produto=mysqli_fetch_object($query);
?>
<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro de Produtos - Alteração </title>
   </head>
   <body>	
      Cadastro de Produtos - Alteração
      <form action="crudPro.php" method="post">
         <input type="text" name="descricao" value="<?php echo $produto->descricao; ?>"><br>
         <input type="text" name="preco" value="<?php  echo $produto->preco; ?>"><br>
		 <input type="text" name="qtdestoque" value="<?php  echo $produto->qtdestoque; ?>"><br>
         <input type="hidden" name="acao" value="4">
         <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>