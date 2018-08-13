<?php
    session_start();
    if(! isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE){
        echo "Acesso não autorizado!<BR>";
        echo "Por gentileza, faça o seu login <A href='login.php'>clicando aqui</A>.";
        exit();
    }
    else{
        echo "Você está logado como usuário: ".$_SESSION["usuario"];
        require_once 'crudVenda.php';
        $obj=new CrudV();
        $query=$obj->listar();
        $num=mysqli_num_rows($query);
        
        if($num>0){
            echo "<table border=1>";
            echo "<tr>
                    <td>id</td>
                    <td>Preco Total</td>
                    <td>Escolha</td>
                </tr>";
            while($array=mysqli_fetch_object($query)){
            echo "<tr>";
                echo "<td>".$array->idVenda."</td>";
                echo "<td>".$array->Total."</td>";
                echo "<td><a href='NotaFiscal.php?id=".$array->idVenda."'>Escolher</a></td>
                </tr>";
        }
            echo "</table>";
            echo "<hr> foram encontrados ".$num." registros";
        }else{
            echo "não há registros no banco de dados";
        }
    }
?>