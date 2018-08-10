<?PHP
    session_start();
    require_once "crud.php";
    $obj = new Crud();

    function sair (){
	   session_destroy();
	   header("Location: login.php");
	   exit();
    }

    if($_REQUEST["action"] == "login"){
        if($_POST["CAMPO_USUARIO"] != "" && $_POST["CAMPO_SENHA"] != ""){
            $login = $_POST["CAMPO_USUARIO"];
            $senha = $_POST["CAMPO_SENHA"];
            if($obj->consultar($login,$senha)){
                $_SESSION["usuario"] = $_POST["CAMPO_USUARIO"];
                $_SESSION["autenticado"] = TRUE;
                header("Location: MenuGeral.php");
            }else{
                echo "Seu nome de usuario ou senha esta incorreto ou nao encontrado";
            }
            
        }else{
            echo "Seu nome de usuário ou senha deve estar preenchido";
        }
    }else if (isset ($_GET["acao"])){
	   sair();
	}

 ?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Validação de Login</title>
    </head>
    <body>
        <BR><BR><a href="login.php"><<--Retornar ao login </a><BR>
        <a href="formCadastro.php">Crie seu Login </a><BR>
    </body>
</html>
 

