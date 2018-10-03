<?php
    require_once '../Controller/ProdutoController.php';
    require_once '../Controller/ValidacaoLogin.php';

    if(ValidacaoLogin::autenticar()) {?>
        <!doctype html>
        <html lang="pt-br">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
            <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">

            <title>Menu Cliente</title>
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
        $produtoControl = new ProdutoController();
        $produtos = $produtoControl->listar();

        if (count($produtos) > 0) {?>
        <div class="container ">
            <table class="table mt-5 bg-info justify-content-center">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade Estoque</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
        <?php
            foreach ($produtos as $produto) {
                echo "<td scope='row'>" . $produto->getIdProduto() . "</td>";
                echo "<td >" . $produto->getDescricao() . "</td>";
                echo "<td>" . $produto->getPreco() . "</td>";
                echo "<td>" . $produto->getQrdestoque() . "</td>";
                echo "<td><a class='text-dark' href='../Controller/ProdutoController.php?acao=2&id=" . $produto->getIdProduto() . "'>Excluir</a>";
                echo " | <a class='text-dark' href='formAlterarProduto.php?id=" . $produto->getIdProduto() . "'>Alterar</a>";
                echo "</td></tr>";
            }
            echo "<tr>";
            echo "<td colspan='5' align='center'><a href='formCadastroProduto.php'><button class='btn btn-dark '>++++++++++Cadastrar Produto+++++++</button></a> </td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "<div class='row justify-content-center mb-4'>";
                echo "<h4>Foram encontrados " . count($produtos) . " registros</h4>";
            echo "</div>";
            echo "<div class='row justify-content-center'>";
                echo "<a href='MenuGeral.php' align='center'><button class='btn btn-info' >Retornar ao Menu</button> </a>";
            echo "</div>";
        } else {
            echo "Não há registros no banco de dados";
        }
    }
?>
                <script src="../node_modules/jquery/dist/jquery.js"></script>
                <script src="../node_modules/popper.js/dist/umd/popper.js" ></script>
                <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
        </body>
</html>
