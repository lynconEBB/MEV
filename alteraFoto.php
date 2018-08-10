<?php 
if( isset($_FILES["arq"])){
    if($_REQUEST['foto']=="no.png"){
        $v=explode(".", $_FILES["arq"]["name"]);
        $t=sizeof($v)-1;
        $ext=$v[$t];
        $foto="Foto".Date("Ymdis").".".$ext;
    }
    else 
        $foto=$_REQUEST['foto'];
    if(move_uploaded_file($_FILES["arq"]["tmp_name"], "foto/".$foto))
        header("Location:relatorioGeral.php");
    else 
        echo "tum";
}
?>
<html>
<head>
 <title>Altera Foto</title>
</head>
<body>
    <img src="foto/<?php echo $_REQUEST['foto']?>" width="100" height="100"><br>
    <form action="alteraFoto.php" method="post" enctype="multipart/form-data">
      <input type="file" name="arq">
      <input type="hidden" name="foto" value="<?php echo $_REQUEST['foto']?>">
      <input type="submit" value="Salvar">
    </form>
</body>
</html>
