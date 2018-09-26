<?php
        require_once "../DAO/PessoaDAO.php";
        $dao = new PessoaDAO();
        $query = $dao->listar();
        $num = mysqli_num_rows($query);
        
        if($num>0){
            echo "<table border = 1>";
            echo "<tr>";
            echo"<td>id</td>";
            echo"<td>Login</td>";
            echo"<td>Nome</td>";
            echo"<td>Email</td>";
            echo"<td>Cidade</td>";
            echo"<td>Bairro</td>";
            echo"<td>Rua</td>";
            echo"<td>Numero</td>";
            echo"<td>CPF</td>";
            echo"<td>Telefone</td>";
            echo"<td>Ações</td>";
            echo"</tr>";
            while($array = mysqli_fetch_object($query)){
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
                echo "<td><a href='../Controller/PessoaController.php?acao=2&id=".$array->idPessoa."'>Excluir</a>";
                echo "|<a href='../View/formAlterarPessoa.php?id=".$array->idPessoa."'>Alterar</a> </td>";
                echo "</tr>";
        }
            echo "</table>";
            echo "<hr> Foram encontrados ".$num." registros";
        }else{
            echo "não há registros no banco de dados";
        }
?>