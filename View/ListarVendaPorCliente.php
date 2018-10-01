<?php
require_once '../Controller/VendaController.php';
require_once '../Controller/ItemController.php';
require_once '../Controller/ValidacaoLogin.php';
if(ValidacaoLogin::autenticar()) {

    $vendaControl = new VendaController();
    $notas = $vendaControl->listarPorCliente($_GET["id"]);
    $cont = 1;
    foreach ($notas as $nota){
        $itens = $nota[1];
        $produtos = $nota[2];
        $cliente = $nota[3];
        $venda = $nota[0];

        echo "<table border=1 align='center'>";
        echo "<tr><td colspan='4' align='center'><b>Venda ".$cont."</b></td></tr>";
        echo "<tr>";
            echo "<td colspan='2'><b>Nome do Cliente </b></td>";
            echo" <td colspan='2'>". $cliente->getNomeCompleto() ."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td colspan='2'><b>Data da Venda: </b></td>";
            echo" <td colspan='2'>". $venda->getDtVenda() ."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td colspan='2'><b>Numero do Cartão </b></td>";
            echo" <td colspan='2'>".  $venda->getCartaoNum() ."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td colspan='2'><b>Bandeira do Cartão </b></td>";
            echo" <td colspan='2'>".  $venda->getCartaoBand() ."</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>Produto</th>";
        echo "<th>Preco Unitario</th>";
        echo "<th>Quantidade</th>";
        echo "<th>Preco Parcial</th>";
        echo "</tr>";
        echo "<tr>";

        $i = 0;
        while ($i < count($produtos)) {
            echo "<td>" . $produtos[$i]->getDescricao() . "</td>";
            echo "<td>" . $produtos[$i]->getPreco() . "</td>";
            echo "<td>" . $itens[$i]->getQtd() . "</td>";
            echo "<td>" . $itens[$i]->getPrecoParcial() . "</td>";
            echo "</tr>";
            $i++;
        }
        echo "<tr>";
        echo "<th colspan=2>Total</th>";
        echo "<th colspan=2 >" . $venda->getTotal() . "</th>";
        echo "</tr>";
        echo "</table><br>";
        $cont++;
    }
}
?>