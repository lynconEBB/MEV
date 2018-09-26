<?php
    session_start();
    if(! isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE){
        echo "Acesso não autorizado!<BR>";
        echo "Por gentileza, faça o seu login <A href='login.php'>clicando aqui</A>.";
        exit();
    }
    else{
        echo "<a href='formEscolheCliente.php'>Cadastro</a><br>";
        echo "<a href='formEscolheNota.php'>Relatório</a>";
    }
?>