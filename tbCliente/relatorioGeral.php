<?php
  require_once 'crud.php';
  $obj=new Crud();
  $query=$obj->listar();
  $num=mysqli_num_rows($query);

    if($num>0){
        echo "<table border=1>";
        echo "<tr>
                <td colspan=4><a href='formCadastro.php'> CADASTRAR CLIENTE</a></td>
              </tr>";
        echo "<tr>
                <td> Codigo </td>
                <td> Nome Completo </td>
                <td> CPF </td>
                <td> Cidade </td>
                <td> Bairro </td>
                <td> Rua </td>
                <td> Numero </td>
                <td> CEP </td>
                <td> Telefone Fixo </td>
                <td> Celular </td>
                <td> Email </td>
                <td> Edição </td>
            </tr>";
            while($array=mysqli_fetch_object($query)){
              echo "<tr>";
                echo "<td>".$array->id_Cliente."</td>";
                echo "<td>".$array->NomeCompleto."</td>";
                echo "<td>".$array->CPF."</td>";
                echo "<td>".$array->Cidade."</td>";
                echo "<td>".$array->Bairro."</td>";
                echo "<td>".$array->Rua."</td>";
                echo "<td>".$array->Numero."</td>";
                echo "<td>".$array->CEP."</td>";
                echo "<td>".$array->TelefoneFixo."</td>";
                echo "<td>".$array->Celular."</td>";
                echo "<td>".$array->Email."</td>";
                echo "<td>
                        <a href='formAlterar.php?id=".$array->id_Cliente."'>Alterar</a> | <a href='crud.php?acao=2&id=".$array->id_Cliente."'>Excluir</a> 
                      </td> 
              </tr>";
            }
        echo "<table>";
        echo "<hr>  ".$num." registros cadastrados";
  }else{
      echo "Não há registros no banco de dados";
  }
?>