<?php
require_once '../Controller/ValidacaoLogin.php';
if(ValidacaoLogin::autenticar()) {

?>
    <a href='formCadastroVenda.php'>Cadastro</a><br>
    <a href='formEscolheVendaPorID.php'>Listar Vendas pelo Id</a><br>
    <a href='formEscolheVendaPorCliente.php'>Listar Vendas por Cliente</a>

<?php
}
?>