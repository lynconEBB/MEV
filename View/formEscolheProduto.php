

<meta charset="utf-8">
<html>
    <head>
        <title>Informar Produto</title>
    </head>
    <body> 
        <h1> Escolha o(s) Produto(s)</h1>
        <?php
            require "crudVenda.php";
            $vend = new CrudV();
            $idVenda =$vend->inserir();
            echo $idVenda;

            require_once '../tbProduto/crudPro.php';
            $obj=new CrudP();
            $query=$obj->listar();

            echo "<form action='../Controller/crudVenda.php' method='post'  enctype='multipart/form-data'>";
                echo "<table border=1>";
                echo "<tr>
                        <td>ID</td>
                        <td>Descrição</td>
                        <td>Preço</td>
                        <td>Quantidade Estoque</td>
                        <td>Seleção</td>
                        <td>Quantidade</td>
                    </tr>";
                echo "<tr>";
                $pos=0;
                while($array=mysqli_fetch_object($query)){
                    echo "<td>".$array->idProduto."</td>";
                    echo "<td>".$array->descricao."</td>";
                    echo "<td>".$array->preco."</td>";
                    echo "<td>".$array->qtdestoque."</td>";
                    echo "<td><input type='checkbox' name='produtos[]' value='".$array->idProduto."-".$pos."-".$array->preco."'></td> ";
                    echo "<td><input type='number' name='Quantidade[]' value='0'></td>
                    </tr>";
                    $pos++;
                }
                echo "<table>";
                echo "<input type='hidden' name='idVenda' value='".$idVenda."'>";
                echo "<input type='hidden' name='acao' value='2'>";
                echo "<br><input type='submit' value='Realizar Venda'>";
            echo "</form>";
          
        ?>
   </body>
</html>