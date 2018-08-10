<?PHP
    session_start();
    if(! isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE){
        echo "Acesso não autorizado!<BR>";
        echo "Por gentileza, faça o seu login <A href='login.php'>clicando aqui</A>.";
        exit();
    }
    else{
        echo "Você está logado como usuário: ".$_SESSION["usuario"];
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Menu Mimo e Você</title>
    </head>
    <body>
        <h3><a href="../tbPessoa/cliente.php">Menu Cliente</a></h3><br>
        <h3><a href="../tbProduto/produto.php">Menu Produto</a></h3><br>
        <h3><a href="../tbVenda/formCadastroVenda_new.php">Menu Venda</a></h3><br><br>
        <a href="validacao.php?acao=0">Sair</a><BR>
    </body>
</html>
<?php
    }
?>