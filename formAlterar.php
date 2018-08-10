<?php 
   require_once 'crud.php';
   $obj=new Crud();
   $query=$obj->listaPorId($_REQUEST["id"]);
   $pessoa=mysqli_fetch_object($query);
?>
<meta charset="utf-8">
<html>
   <head>
      <title>Cadastro de pessoas - Alteração </title>
   </head>
   <body>	
      Cadastro de pessoas - Alteração
      <form action="crud.php" method="post">
         <input type="text" name="nome" value="<?php echo $pessoa->nome; ?>"><br>
         <input type="text" name="endereco" value="<?php  echo $pessoa->endereco; ?>"><br>
         <input type="hidden" name="acao" value="4">
         <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>