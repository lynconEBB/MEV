<meta charset="utf-8">
<html>
    <head>
        <title>Informar Cliente</title>
    </head>
    <body> 
        <h1> Escolha o Cliente</h1>
        <?php
            require_once '../tbPessoa/crud.php';
            $obj=new Crud();
            $query=$obj->listar();
                echo "<table border=1>";
                echo "<tr>
                        <td>id</td>
                        <td>Login</td>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Cidade</td>
                        <td>Bairro</td>
                        <td>Rua</td>
                        <td>Numero</td>
                        <td>CPF</td>
                        <td>Telefone</td>
                        <td>Escolha</td>
                    </tr>";
                while($array=mysqli_fetch_object($query)){
                echo "<tr>";
                    echo "<td>".$array->idPessoa."</td>";
                    echo "<td>".$array->Login."</td>";
                    echo "<td>".$array->NomeCompleto."</td>";
                    echo "<td>".$array->Email."</td>";
                    echo "<td>".$array->Cidade."</td>";
                    echo "<td>".$array->Bairro."</td>";
                    echo "<td>".$array->Rua."</td>";
                    echo "<td>".$array->Numero."</td>";
                    echo "<td>".$array->CPF."</td>";
                    echo "<td>".$array->Telefone."</td>";
                    echo "<td><a href='formCadastroVenda.php?idCli=".$array->idPessoa."'>Escolher</a></td>
                    </tr>";
            }
            echo "</table>";
        ?>
   </body>
</html>