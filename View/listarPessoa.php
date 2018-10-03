<?php
    require_once "../Controller/PessoaController.php";
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

        <nav class="navbar navbar-expand-lg navbar-light bg-gradient-info">
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
        $pessoaControl = new PessoaController();
        $pessoas = $pessoaControl->listar();

        if (count($pessoas) > 0) {?>
        <div class="container">
            <table class="table bg-info justify-content-center mt-5" >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Login</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Cidade</th>
                <th scope="col">Bairro</th>
                <th scope="col">Rua</th>
                <th scope="col">Numero</th>
                <th scope="col">CPF</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ações</th>
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
                echo "<td>" . $pessoa->getCpf() . "</td>";
                echo "<td width='150'>" . $pessoa->getTelefone() . "</td>";
                echo "<td><a class='text-dark' href='../Controller/PessoaController.php?acao=2&id=" . $pessoa->getIdPessoa() . "'>Excluir</a> ";
                echo "<a class='text-dark' href='../View/formAlterarPessoa.php?id=" . $pessoa->getIdPessoa() . "'>Alterar</a> </td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td colspan='11' align='center'><a href='formCadastroPessoa.php'><button class='btn btn-dark '>++++++++++Cadastrar Pessoa+++++++</button> </a> </td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
            echo "<div class='row justify-content-center mb-4'>";
            echo "<h4>Foram encontrados " . count($pessoas) . " registros</h4>";
            echo "</div>";
            echo "<div class='row justify-content-center'>";
            echo "<br><a href='MenuGeral.php' align='center'><button class='btn btn-info' >Retornar ao Menu</button> </a>";
            echo "</div>";
        } else {
            echo "não há registros no banco de dados";
        }
    }
?>
                <script src="../node_modules/jquery/dist/jquery.js"></script>
                <script src="../node_modules/popper.js/dist/umd/popper.js" ></script>
                <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
        </body>
</html>
