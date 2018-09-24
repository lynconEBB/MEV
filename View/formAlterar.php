<?php 
    session_start();
    if(! isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE){
        echo "Acesso não autorizado!<BR>";
        echo "Por gentileza, faça o seu login <A href='../Inicio/login.php'>clicando aqui</A>.";
        exit();
    }
    else{
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
        <?php echo $pessoa->Senha?>
        <form action="../Controller/crud.php" method="post">
            Nome: <input type="text" name="NomeCompleto" value="<?php echo $pessoa->NomeCompleto?>"><br>
            E-mail: <input type="text" name="Email" value="<?php echo $pessoa->Email?>"><br>
            Login: <input type="text" name="Login" value="<?php echo $pessoa->Login?>"><br>
            CPF: <input type="text" name="CPF" value="<?php echo $pessoa->CPF?>"><br>
            Cidade: <input type="text" name="Cidade" value="<?php echo $pessoa->Cidade?>"><br>
            Bairro: <input type="text" name="Bairro" value="<?php echo $pessoa->Bairro?>"><br>
            Rua: <input type="text" name="Rua" value="<?php echo $pessoa->Rua?>"><br>
            Numero: <input type="text" name="Numero" value="<?php echo $pessoa->Numero?>"><br>
            Telefone: <input type="text" name="Telefone" value="<?php echo $pessoa->Telefone?>"><br>
            <input type="hidden" name="TipoPessoa" value="1">
            <input type="hidden" name="acao" value="4">
            <input type="hidden" name="idPessoa" value="<?php echo $_REQUEST["id"]?>">
            <input type="submit" value="Salvar">
        </form>
   </body>
</html>
<?php
    }
?>