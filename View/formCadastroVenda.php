<?php
require_once '../Controller/ValidacaoLogin.php';
if(ValidacaoLogin::autenticar()) {
    require_once '../Controller/PessoaController.php';
    $pessoaControl = new PessoaController();
    $pessoas = $pessoaControl->listar();
    ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">

    <title>Alteração de Produtos</title>
</head>
<body class="bg-gradient-secondary">
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
        <a class="navbar-brand h1 mb-0" href="MenuGeral.php">Mimo&Você</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSite">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="TelaLogin.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listarProduto.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formEscolheVendaPorID.php">Venda</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="listarPessoa.php">Clientes</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Social</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Facebook</a>
                        <a class="dropdown-item" href="#">Twitter</a>
                        <a class="dropdown-item" href="#">Instagram</a>
                    </div>
                </li>
                <li>
                    <a href="../Controller/ValidacaoLogin.php?action=sair"><button class="btn btn-danger" type="submit">Sair</button></a>
                </li>
            </ul>

        </div>
    </div>

</nav>
<div class="container">
    <form action='../Controller/VendaController.php' method='post' align='center' enctype='multipart/form-data' >
        <h1>Cliente</h1>
        <table align="center" class="table bg-info">
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Rua</th>
                <th>Numero</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Escolha</th>
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
    <table  align="center" class="table bg-info">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade Estoque</th>
            <th>Seleção</th>
            <th>Quantidade</th>
        </tr>

        <tr>
    <?php
    $pos = 0;
    foreach ($produtos as $produto) {
        echo "<td>" . $produto->getIdProduto() . "</td>";
        echo "<td>" . $produto->getDescricao() . "</td>";
        echo "<td>" . $produto->getPreco() . "</td>";
        echo "<td>" . $produto->getQrdEstoque() . "</td>";
        echo "<td><input class='form-check-label' type='checkbox' name='pos[]' value='".$pos."'></td> ";
        echo "<input type='hidden' name='qtdestoque[]' value='".$produto->getQrdEstoque()."'>";
        echo "<input type='hidden' name='preco[]' value='".$produto->getPreco() ."'>";
        echo "<input type='hidden' name='idProduto[]' value='".$produto->getIdProduto() ."'>";
        echo "<td><input class='form-control' type='number' name='Quantidade[]' value='0' min='0' max='" . $produto->getQrdEstoque() . "'></td>";
        echo "</tr>";
        $pos++;
    }
    ?>

    </table>
            <h1>Venda</h1>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputBand"><i class="fa fa-flag"></i> Bandeira do Cartão</label>
                    <input type="text" name="cartaoBand" id="inputBand" placeholder="Bandeira" class="form-control"><BR>
                </div>
                <div class="form-group col-sm-6">
                    <label for="inputNumero"><i class="fa fa-credit-card"></i> Número do Cartão</label>
                    <input type="text" name="cartaoNum" id="inputNumero" placeholder="Número do cartão" class="form-control"><BR>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="inputData" class="lead"> Data da Venda</label>
                    <input type="date" name="dtVenda" id="inputData" placeholder="Data" class="form-control"><BR>
                </div>
            </div>
            <div class=" form-row">
                <div class="form-group col-sm-6">
                    <input type="SUBMIT" value="Cadastrar" class="btn btn-info form-control">
                </div>
                <div class="form-group col-sm-6">
                    <input type="reset" value="Limpar" class="btn btn-warning form-control">
                    <input type="hidden" name="escolha" value="1">
                </div>
            </div>
    <input type='hidden' name='escolha' value='1'><br><br>
    </form>
    </div>
    </body>
    </html>
    <?php
}
?>