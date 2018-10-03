<?php
    require_once '../Controller/VendaController.php';
    require_once '../Controller/ValidacaoLogin.php';
    if(ValidacaoLogin::autenticar()) {?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">

    <title>Menu Vendas</title>
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
<?php
        $vendaControl = new VendaController();
        $vendas = $vendaControl->listar();

        $num = count($vendas);

        if ($num > 0) {?>
            <div class="container">
            <table class="table bg-info mt-5">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Preco Total</th>
                        <th scope="col">Numero do Cartao</th>
                        <th scope="col">Bandeira do Cartao</th>
                        <th scope="col">Id do Cliente</th>
                        <th scope="col">Data da Venda</th>
                        <th scope="col">Escolha</th>
                    </tr>
                </thead>
                <tbody>
    <?php
            foreach ($vendas as $venda) {
                echo "<tr>";
                echo "<td>" . $venda->getIdVenda() . "</td>";
                echo "<td>" . $venda->getTotal() . "</td>";
                echo "<td>" . $venda->getCartaoNum() . "</td>";
                echo "<td>" . $venda->getCartaoBand() . "</td>";
                echo "<td>" . $venda->getIdCliente() . "</td>";
                echo "<td>" . $venda->getDtVenda() . "</td>";
                echo "<td><a class='text-dark' href='listarVendaPorID.php?id=" . $venda->getIdVenda() . "'>Escolher</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "<div class='row justify-content-center mb-4'>";
                echo "<h4>Foram encontrados " . count($vendas) . " registros</h4>";
            echo "</div>";
            echo "<div class='row justify-content-center'>";
                echo "<a href='MenuGeral.php' align='center'><button class='btn btn-info' >Retornar ao Menu</button> </a>";
            echo "</div>";
        } else {
            echo "Não há registros no banco de dados";
        }
    }
?>