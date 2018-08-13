<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Login de Cliente</TITLE>
    </HEAD>
    <BODY>
        <h3>Preencha os campos abaixo</h3>
        <FORM action="validacao.php?action=login" method="POST">
            Digite o seu nome: 
            <INPUT type="TEXT" name="CAMPO_USUARIO"><BR>
            Digite sua senha: 
            <INPUT type="PASSWORD" name="CAMPO_SENHA"><BR>
            <INPUT type="SUBMIT" value="Autenticar">
            <input type="reset" value="Limpar">
        </FORM>
    </BODY>
</HTML>