<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro de Produtos</title>
   </head>
   <body>
	  Cadastro de Produtos 
      <form action="crudProduto.php" method="post" enctype="multipart/form-data">

         <br> Nome do Produto:  <input type=TEXT  name= CAMPO_NOME>
         <br> Descrição: <input type=TEXT  name= CAMPO_DESCRICAO>
         <br> Qtd. Estoque: <input type=TEXT  name= CAMPO_QTDESTOQUE>
         <br> Preço: <input type=TEXT  name= CAMPO_PRECO>

         <input type="hidden" name="acao" value="1">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>