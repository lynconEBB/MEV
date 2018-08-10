<?php
    session_start();
    if(! isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE){
        echo "Acesso não autorizado!<BR>";
        echo "Por gentileza, faça o seu login <A href='login.php'>clicando aqui</A>.";
        exit();
    }
    else{
?>
<HTML>
    <HEAD>
        <TITLE>Gerenciando Vendas</TITLE>
        <meta charset="utf-8">
    </HEAD>
    <BODY>
        <h3>Preencha os campos abaixo</h3>
        <form action="crudV_new.php" method="post" enctype="multipart/form-data"> 
            <BR>Data Venda: <INPUT type=DATE  name= DtVenda>
            <BR> Bandeira Cartão:  <INPUT type=TEXT  name= BandCartao>
            <BR> Número do Cartao: <INPUT type=TEXT  name= NCartao>
            <BR> Codigo do Cliente: <INPUT type=INT  name= idcliente>
            <BR> Codigo do Produto: <INPUT type=INT  name= idProduto>
            <BR> Preco: <INPUT type=INT  name= preco>
            <BR> Quantidade: <INPUT type=INT  name= qtd>
            <input type="hidden" name="acao" value="5">
            <input type="submit" value="Comprar">
            <BR>
        </form>
    </BODY>
</HTML>

<?php
    }
    require_once '../tbPessoa/crud.php'; 
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
            echo "</tr>";
        }
        echo "</table>";
        echo "<hr> Foram encontrados ".$num." registros";
    }else{
        echo "Não há registros no banco de dados";
    }

    require_once '../tbProduto/crudPro.php';  
    $obj=new Crudp();
    $query= $obj->listar();
    $num=mysqli_num_rows($query);
    if($num>0){
        echo "<table border=1>";
        echo "<tr><td>id</td><td>Descrição</td><td>Preço</td><td>Qtd em Estoque</tr>";
        while($array=mysqli_fetch_object($query)){
            echo "<td>".$array->idProduto."</td>";
            echo "<td>".$array->descricao."</td>";
            echo "<td>".$array->preco."</td>";
            echo "<td>".$array->qtdestoque."</td>";
            echo "</tr>";
        }
        echo "<table>";
        echo "<hr> Foram encontrados ".$num." registros";
    }else{
        echo "Não há registros no banco de dados";
    }
    
?>
