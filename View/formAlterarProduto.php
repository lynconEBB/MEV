<?php
    require_once '../DAO/ProdutoDAO.php';
    $obj = new ProdutoDAO();
    $query = $obj->listaPorId($_REQUEST["id"]);
    $produto = mysqli_fetch_object($query);
?>
<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro de Produtos - Alteração </title>
   </head>
   <body>	
      Cadastro de Produtos - Alteração
      <form action="../Controller/ProdutoController.php" method="post">
         <input type="text" name="descricao" value="<?php echo $produto->descricao; ?>"><br>
         <input type="text" name="preco" value="<?php  echo $produto->preco; ?>"><br>
		 <input type="text" name="qtdestoque" value="<?php  echo $produto->qtdestoque; ?>"><br>
         <input type="hidden" name="acao" value="3">
         <input type="hidden" name="idProduto" value="<?php echo $_REQUEST["id"]?>">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>
