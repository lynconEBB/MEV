<HTML>
    <HEAD>
        <TITLE>Gerenciando Vendas</TITLE>
        <meta charset="utf-8">
    </HEAD>
    <BODY>
        <h3>Preencha os campos abaixo</h3>
        <form action="formEscolheProduto.php" method="post" enctype="multipart/form-data"> 
            <BR>Data Venda: <INPUT type="date"  name= "dtVenda">
            <BR> Bandeira Cartão:  <INPUT type="text"  name="cartaoBand">
            <BR> Número do Cartao: <INPUT type="text"  name="cartaoNum">
            <input type="hidden" name="idCliente" value="<?php echo $_REQUEST["idCli"]?>">
            <input type="submit" value="Comprar">
            <BR>
        </form>
    </BODY>
</HTML>


