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

         <br> Nome Completo:  <input type=TEXT  name= CAMPO_NOME value = "<?php echo $pessoa->NomeCompleto; ?>">
         <br> CPF: <input type=TEXT  name= CAMPO_CPF value = "<?php echo $pessoa->CPF; ?>">
         <br> Cidade: <input type=TEXT  name= CAMPO_CIDADE value = "<?php echo $pessoa->Cidade; ?>">
         <br> Bairro: <input type=TEXT  name= CAMPO_BAIRRO value = "<?php echo $pessoa->Bairro; ?>">
         <br> Rua: <input type=TEXT  name= CAMPO_RUA value = "<?php echo $pessoa->Rua; ?>">
         <br> Numero: <input type=NUMBER  name= CAMPO_NUMERO value = "<?php echo $pessoa->Numero; ?>">
         <br> CEP: <input type=TEXT  name= CAMPO_CEP value = "<?php echo $pessoa->CEP; ?>">
         <br> Telefone Fixo: <input type=TEXT  name= CAMPO_TELEFONEFIXO value = "<?php echo $pessoa->TelefoneFixo; ?>">
         <br> Celular: <input type=TEXT  name= CAMPO_CELULAR value = "<?php echo $pessoa->Celular; ?>">
         <br> Email: <input type=TEXT  name= CAMPO_EMAIL value = "<?php echo $pessoa->Email; ?>">

         <input type="hidden" name="acao" value="4">
         <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
         <input type="submit" value="Salvar">
      </form>
   </body>
</html>