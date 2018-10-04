<?php
    require_once '../Controller/VendaController.php';
    require_once '../Controller/ItemController.php';
    require_once '../Controller/ValidacaoLogin.php';
    if(ValidacaoLogin::autenticar()) {?>
        <!doctype html>
        <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
            <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">

            <title>Cadastro de Produtos</title>
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
        $nota = $vendaControl->listarPorId($_GET["id"]);
        $itens = $nota[0];
        $produtos = $nota[1];
        $cliente = $nota[2];
        $venda = $nota[3];
        echo "<div class='container'>";
            echo "<table class='table table-warning mt-5' align='center'>";
                echo "<td colspan='2'><b>Nome do Cliente: </b></td>";
                echo" <td colspan='2'>". $cliente->getNomeCompleto() ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='2'><b>Data da Venda: </b></td>";
                echo" <td colspan='2'>". $venda->getDtVenda() ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='2'><b>Numero do Cartão: </b></td>";
                echo" <td colspan='2'>".  $venda->getCartaoNum() ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='2'><b>Bandeira do Cartão: </b></td>";
                echo" <td colspan='2'>".  $venda->getCartaoBand() ."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='text-center bg-warning'>Produto</th>";
                echo "<th class='text-center bg-warning'>Preco Unitario</th>";
                echo "<th class='text-center bg-warning'>Quantidade</th>";
                echo "<th class='text-center bg-warning'>Preco Parcial</th>";
                echo "</tr>";
                echo "<tr>";

        $i = 0;
        while ($i < count($produtos)) {
            echo "<th class='text-center bg-warning'>" . $produtos[$i]->getDescricao() . "</th>";
            echo "<td class='text-center bg-warning'>" . $produtos[$i]->getPreco() . "</td>";
            echo "<td class='text-center bg-warning'>" . $itens[$i]->getQtd() . "</td>";
            echo "<td class='text-center bg-warning'>" . $itens[$i]->getPrecoParcial() . "</td>";
            echo "</tr>";
            $i++;
        }
        echo "<tr>";
        echo "<th colspan=2 class='text-center bg-warning'>Total</th>";
        echo "<th colspan=2 class='text-center bg-warning'>" . $venda->getTotal() . "</th>";
        echo "</tr>";
        echo "</table>";
        echo "<div class='row justify-content-center'>";
        echo "<a href='MenuGeral.php' align='center'><button class='btn btn-info' >Retornar ao Menu</button> </a>";
        echo "</div>";
    }
?>
        </body>
</html>
