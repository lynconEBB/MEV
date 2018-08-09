<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro de pessoas</title>
   </head>
   <body>
	  Cadastro de pessoas 
      <form action="crud.php" method="post" enctype="multipart/form-data">

         <br> Nome Completo:  <input type=TEXT  name= CAMPO_NOME>
         <br> CPF: <input type=TEXT  name= CAMPO_CPF>
         <br> Cidade: <input type=TEXT  name= CAMPO_CIDADE>
         <br> Bairro: <input type=TEXT  name= CAMPO_BAIRRO>
         <br> Rua: <input type=TEXT  name= CAMPO_RUA>
         <br> Numero: <input type="NUMBER"  name=" CAMPO_NUMERO">
         <br> CEP: <input type=TEXT  name= CAMPO_CEP>
         <br> Telefone Fixo: <input type=TEXT  name= CAMPO_TELEFONEFIXO>
         <br> Celular: <input type=TEXT  name= CAMPO_CELULAR>
         <br> Email: <input type=TEXT  name= CAMPO_EMAIL>

         <input type="hidden" name="acao" value="1">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>