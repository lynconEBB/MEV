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
            echo "<td><a href='listarVendaPorCliente.php?id=" . $pessoa->getIdPessoa() . "'>Escolher</a>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "</table>";
        echo "<br><a href='MenuGeral.php'>Retornar ao Menu</a>";
    } else {
        echo "não há registros no banco de dados";
    }
}
?>