<?php
    session_start();
    if(! isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE){
        echo "Acesso não autorizado!<BR>";
        echo "Por gentileza, faça o seu login <A href='login.php'>clicando aqui</A>.";
        exit();
    }
    else{
        echo "Você está logado como usuário: ".$_SESSION["usuario"]."<br><br>";
        require_once 'crudVenda.php';
        $obj=new CrudV();
        $query=$obj->geraNotaFiscal();
        $query2=$obj->geraNotaFiscal();
    
        $array2=mysqli_fetch_object($query2);
        echo "<b>Nome do Cliente: </b>".$array2->NomeCompleto."<br>";
        echo "<b>Data da Venda: </b>".$array2->dtVenda."<br>";
        echo "<b>Numero do Cartão: </b>".$array2->cartaoNum."<br>";
        echo "<b>Bandeira do Cartão: </b>".$array2->cartaoBand."<br><br>";
        echo "<table border=1>";
            echo "<tr>
                    <th>Produto</th>
                    <th>Preco Unitario</th>
                    <th>Quantidade</th>
                    <th>Preco Parcial</th>
                </tr>";
            echo "<tr>";
            while($array=mysqli_fetch_object($query)){
                echo "<td>".$array->descricao."</td>";
                echo "<td>".$array->preco."</td>";
                echo "<td>".$array->qtd."</td>";
                echo "<td>".$array->PrecoParcial."</td>";
                echo "</tr>";
            }
            echo "<tr>
                <th colspan=2>Total</th>
                <th colspan=2 >".$array2->Total."</th>
                
            </tr>";

        echo "</table>";
    }
?>