<?php
    session_start();
    if(! isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE){
        echo "Acesso não autorizado!<BR>";
        echo "Por gentileza, faça o seu login <A href='login.php'>clicando aqui</A>.";
        exit();
    }
    else{
        echo "Você está logado como usuário: ".$_SESSION["usuario"];
        require_once 'crud.php';
        $obj=new Crud();
        $query=$obj->listar();
        $num=mysqli_num_rows($query);
        
        if($num>0){
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
                    <td>Ações</td>
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
                echo "<td><a href='crud.php?acao=2&id=".$array->idPessoa."'>Excluir</a>
                        |<a href='formAlterar.php?id=".$array->idPessoa."'>Alterar</a> 
                        </td>
                </tr>";
        }
            echo "</table>";
            echo "<hr> foram encontrados ".$num." registros";
        }else{
            echo "não há registros no banco de dados";
        }
    }
?>