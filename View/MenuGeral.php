<?php
    require_once '../Controller/ValidacaoLogin.php';
    if(ValidacaoLogin::autenticar()) {
        ?>
        <!doctype html>
        <html lang="pt-br">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
            <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">

            <title>Login Mimo e Você</title>
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

        <div class="row justify-content-sm-center"><!-- row cards -->

            <div class="col-sm-5 col-md-3 mb-5 mt-5"><!-- col-sm-4 cards -->
                <div class="card">
                    <a href="listarPessoa.php"> <img class="card-img-top" src="../imgs/cliente.jpg"/></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            Menu Cliente
                        </h4>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Gerenciamento de Clientes
                        </h6>
                        <div class="row">
                            <p class="card-text col-12 text-truncate">
                                Neste menu você pode fazer todas essas ações:
                            </p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Listar os Clientes</li>
                        <li class="list-group-item">Alterar os dados de um Cliente</li>
                        <li class="list-group-item">Excluir um Cliente</li>
                        <li class="list-group-item">Cadastrar um novo Cliente</li>
                    </ul>
                    <div class="card-body">
                        <a href="listarPessoa.php" class="card-link">Ir para Menu Cliente</a>
                    </div>
                </div>
            </div><!-- /col-sm-4 cards -->

            <div class="col-sm-5 col-md-3 mb-5 mt-5"><!-- col-sm-4 cards -->
                <div class="card">
                    <a href="listarProduto.php"><img class="card-img-top" src="../imgs/produto2.png"/></a>
                    <div class="card-body">
                        <h4 class="card-title">Menu Produto</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Gerenciamento de Produtos</h6>
                        <p class="card-text">
                            Neste menu você pode fazer todas essas ações:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Listar os Produtos em estoque</li>
                        <li class="list-group-item">Alterar os dados de um Produto</li>
                        <li class="list-group-item">Excluir um Produto</li>
                        <li class="list-group-item">Cadastrar um novo Produto</li>
                    </ul>
                    <div class="card-body">
                        <a href="listarProduto.php" class="card-link">Ir para Menu Produtos</a>
                    </div>
                </div>
            </div><!-- /col-sm-4 cards -->

            <div class="col-sm-5 col-md-3 mb-5 mt-5"><!-- col-sm-4 cards -->
                <div class="card">
                    <a href="formEscolheVendaPorID.php"> <img class="card-img-top" src="../imgs/venda2.jpg" /></a>
                    <div class="card-body">
                        <h4 class="card-title">Menu Vendas</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Gerenciamento de Vendas</h6>
                        <p class="card-text">
                            Neste menu você pode fazer todas essas ações:
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Listar todas as Vendas</li>
                        <li class="list-group-item">Exibir os dados de uma venda por ID</li>
                        <li class="list-group-item">Exibir as vendas realizadas por um Cliente</li>
                        <li class="list-group-item">Cadastrar uma nova Venda</li>
                    </ul>
                    <div class="card-body">
                        <a href="formEscolheVendaPorID.php" class="card-link">Ir para Menu Venda</a>
                    </div>
                </div>
            </div><!-- /col-sm-4 cards -->

        </div>

        <script src="../node_modules/jquery/dist/jquery.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.js" ></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
        </body>

        <?php
    }
    ?>