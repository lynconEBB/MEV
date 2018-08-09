<html>
  <head>
    <title>Gerenciando Venda</title>
    <meta charset="utf-8">
  </head>
  <body>
	 Preencha os campos abaixo
    <form name="crudVenda.php" method="post" enctype="multipart/form-data">
	       <br> Data da Compra:  <input type=TEXT  name= CAMPO_DATA>
         <br> Bandeira do Cartão: <input type=TEXT  name= CAMPO_BANDEIRA>
         <br> Número do Cartão: <input type=NUMBER  name= CAMPO_NUMERO>
         <br> Quantidade: <input type=NUMBER  name= CAMPO_QTD>
         <br> Total: <input type=TEXT  name= CAMPO_TOTAL>
         <br> ID Cliente: <input type=TEXT  name= CAMPO_ID>
    <br>
    <input type="hidden" name="acao" value="1">
    <input type="submit" value="Salvar">
    </form>
  </body>
</html>
