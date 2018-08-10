<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro de produtos</title>
   </head>
   <body>
	  Cadastro de produtos
      <form action="crudPro.php" method="post" enctype="multipart/form-data">
		 <! -- <input type="number" name="id" placeholder="Seu Id"><br> -->
         <input type="text" name="descricao" placeholder="Descricao Produto"><br>
         <input type="text" name="preco" placeholder="Valor do Produto"><br>
		 <input type="text" name="qtdestoque" placeholder="Qtd em estoque"><br>
         <input type="hidden" name="acao" value="1">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>