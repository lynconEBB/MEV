<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro de pessoas</title>
   </head>
   <body>
	  Cadastro de pessoas 
      <form action="crud.php" method="post" enctype="multipart/form-data">
		 <! -- <input type="number" name="id" placeholder="Seu Id"><br> -->
         <input type="text" name="nome" placeholder="Seu nome"><br>
         <input type="text" name="endereco" placeholder="Seu endereco"><br>
         <input type="hidden" name="acao" value="1">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>