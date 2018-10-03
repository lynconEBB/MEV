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

    <div class="container">
        <div class="row justify-content-center mb-5 mt-2">
            <h3 class="display-4 text-light">Preencha os campos abaixo</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <FORM action="../Controller/ValidacaoLogin.php?action=login" method="POST">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="inputUsuario"><i class="fa fa-user"></i> Nome de Usuário:</label>
                            <input type="text" name="CAMPO_USUARIO" id="inputUsuario" placeholder="Nome de Usuario" class="form-control"><BR>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="inputSenha"><i class="fa fa-key" ></i> Senha</label>
                            <input type="password" name="CAMPO_SENHA" id="inputSenha" placeholder="Senha" class="form-control"><BR>
                        </div>
                    </div>
                    <div class=" form-row">
                        <div class="form-group col-sm-6">
                            <input type="SUBMIT" value="Autenticar" class="btn btn-info form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="reset" value="Limpar" class="btn btn-warning form-control">
                        </div>
                    </div>

                </FORM>

            </div>
        </div>
        <div class="row justify-content-center">
                <a href="formCadastroPessoa.php"><button class="btn btn-danger"><i class="fa fa-book"></i>  Cadastra-se</button></a>
        </div>
    </div>

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js" ></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </body>


</html>