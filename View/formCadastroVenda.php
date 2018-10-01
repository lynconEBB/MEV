<?php
require_once '../Controller/ValidacaoLogin.php';
if(ValidacaoLogin::autenticar()) {
    require_once '../Controller/PessoaController.php';
    $pessoaControl = new PessoaController();
    $pessoas = $pessoaControl->listar();
    ?>
    <meta charset="utf-8">
    <html>
    <head>
        <title>Cadastro da Venda</title>
    </head>
    <body>

    <form action='../Controller/VendaController.php' method='post' align='center' enctype='multipart/form-data' >
        <h1>Cliente</h1>
        <table border=1 align="center">
            <tr>
                <td>ID</td>
                <td>Login</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Cidade</td>
                <td>Bairro</td>
                <td>Rua</td>
                <td>Numero</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Escolha</td>
            </tr>
        <?php
            foreach ($pessoas as $pessoa) {
                echo "<tr>";
                echo "<td>" . $pessoa->getIdPessoa() . "</td>";
                echo "<td>" . $pessoa->getLogin() . "</td>";
                echo "<td>" . $pessoa->getNomeCompleto() . "</td>";
                echo "<td>" . $pessoa->getEmail() . "</td>";
                echo "<td>" . $pessoa->getCidade() . "</td>";
                echo "<td>" . $pessoa->getBairro() . "</td>";
                echo "<td>" . $pessoa->getRua() . "</td>";
                echo "<td>" . $pessoa->getNumero() . "</td>";
                echo "<td>" . $pessoa->getCPF() . "</td>";
                echo "<td>" . $pessoa->getTelefone() . "</td>";
                echo "<td><input type='radio' name='idPessoa' value='" . $pessoa->getIdPessoa() . "'></td>";
                echo "</tr>";
    }
    echo "</table><br>";

    require_once '../Controller/ProdutoController.php';
    $produtoControl = new ProdutoController();
    $produtos = $produtoControl->listar();

    ?>
    <h1>Produto</h1>
    <table border=1 align="center">
        <tr>
            <td>ID</td>
            <td>Descrição</td>
            <td>Preço</td>
            <td>Quantidade Estoque</td>
            <td>Seleção</td>
            <td>Quantidade</td>
        </tr>

        <tr>
    <?php
    $pos = 0;
    foreach ($produtos as $produto) {
        echo "<td>" . $produto->getIdProduto() . "</td>";
        echo "<td>" . $produto->getDescricao() . "</td>";
        echo "<td>" . $produto->getPreco() . "</td>";
        echo "<td>" . $produto->getQrdEstoque() . "</td>";
        echo "<td><input type='checkbox' name='produtos[]' value='" . $produto->getIdProduto() . "-" . $pos . "-" . $produto->getPreco() . "-" . $produto->getQrdEstoque() . "'></td> ";
        echo "<td><input type='number' name='Quantidade[]' value='0' min='0' max='" . $produto->getQrdEstoque() . "'></td>";
        echo "</tr>";
        $pos++;
    }
    ?>

    </table><br>

    <h1>Venda</h1>
    Data Venda: <INPUT type="date"  name= "dtVenda">
    <BR> Bandeira Cartão:  <INPUT type="text"  name="cartaoBand">
    <BR> Número do Cartao: <INPUT type="text"  name="cartaoNum">
    <input type='hidden' name='escolha' value='1'><br><br>
    <br><input type='submit' value='Realizar Venda'>
    </form>

    </body>
    </html>
    <?php
}
?>