<?php
    require_once "../Controller/PessoaController.php";
    require_once '../Controller/ValidacaoLogin.php';
    if(ValidacaoLogin::autenticar()) {
        $pessoaControl = new PessoaController();
        $pessoas = $pessoaControl->listar();

        if (count($pessoas) > 0) {
            echo "<table border = 1 align='center'>";
            echo "<tr>";
            echo "<td>ID</td>";
            echo "<td>Login</td>";
            echo "<td>Nome</td>";
            echo "<td>Email</td>";
            echo "<td>Cidade</td>";
            echo "<td>Bairro</td>";
            echo "<td>Rua</td>";
            echo "<td>Numero</td>";
            echo "<td>CPF</td>";
            echo "<td>Telefone</td>";
            echo "<td>Ações</td>";
            echo "</tr>";

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
                echo "<td>" . $pessoa->getTelefone() . "</td>";
                echo "<td><a href='../Controller/PessoaController.php?acao=2&id=" . $pessoa->getIdPessoa() . "'>Excluir</a>";
                echo "|<a href='../View/formAlterarPessoa.php?id=" . $pessoa->getIdPessoa() . "'>Alterar</a> </td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td colspan='11' align='center'><a href='formCadastroPessoa.php'>++++++++++Cadastrar Pessoa+++++++</a> </td>";
            echo "</tr>";
            echo "</table>";
            echo "<hr>Foram encontrados " . count($pessoas) . " registros";
            echo "<br> <a href='MenuGeral.php'>Retornar ao Menu</a>";
        } else {
            echo "não há registros no banco de dados";
        }
    }
?>