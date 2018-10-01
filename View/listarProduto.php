<?php
    require_once '../Controller/ProdutoController.php';
    require_once '../Controller/ValidacaoLogin.php';

    if(ValidacaoLogin::autenticar()) {
        $produtoControl = new ProdutoController();
        $produtos = $produtoControl->listar();

        if (count($produtos) > 0) {
            echo "<table border=1 align='center'>";
            echo "<tr>";
            echo "<td>id</td>";
            echo "<td>Descrição</td>";
            echo "<td>Preço</td>";
            echo "<td>Quantidade Estoque</td>";
            echo "<td>Ações</td>";
            echo "</tr>";

            foreach ($produtos as $produto) {
                echo "<td>" . $produto->getIdProduto() . "</td>";
                echo "<td>" . $produto->getDescricao() . "</td>";
                echo "<td>" . $produto->getPreco() . "</td>";
                echo "<td>" . $produto->getQrdestoque() . "</td>";
                echo "<td><a href='../Controller/ProdutoController.php?acao=2&id=" . $produto->getIdProduto() . "'>Excluir</a>";
                echo "|<a href='formAlterarProduto.php?id=" . $produto->getIdProduto() . "'>Alterar</a>";
                echo "</td></tr>";
            }
            echo "<tr>";
            echo "<td colspan='5' align='center'><a href='formCadastroProduto.php'>++++++++++Cadastrar Produto+++++++</a> </td>";
            echo "</tr>";
            echo "</table>";
            echo "<hr>Foram encontrados " . count($produtos) . " registros";
            echo "<br> <a href='MenuGeral.php'>Retornar ao Menu</a>";
        } else {
            echo "Não há registros no banco de dados";
        }
    }
?>