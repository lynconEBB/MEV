<?php
require_once "PessoaController.php";

class ValidacaoLogin{

    private $login;
    private $senha;

    public function __construct(){
        session_start();
        $pessoaControl = new PessoaController();

        if (isset($_GET["action"]) and $_GET["action"] == "login") {


            if ($_POST["CAMPO_USUARIO"] != "" && $_POST["CAMPO_SENHA"] != "") {
                $this->login = $_POST["CAMPO_USUARIO"];
                $this->senha = $_POST["CAMPO_SENHA"];

                if ($pessoaControl->consultar($this->login, $this->senha)) {
                    $_SESSION["usuario"] = $_POST["CAMPO_USUARIO"];
                    $_SESSION["autenticado"] = TRUE;
                    header("Location: ../View/MenuGeral.php");
                } else {
                    echo "Seu nome de usuario ou senha esta incorreto ou nao encontrado";
                }
            } else {
                echo "Os campos devem estar Preenchidos";
            }
        }

        if (isset($_GET["action"]) and $_GET["action"] == "sair") {
            $this->sair();
            header("Location: ../View/MenuGeral.php");
        }
    }

    public function sair(){
        session_destroy();
        header("Location: ../View/TelaLogin.php");
        exit();
    }

    public static function autenticar(){
        if(isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] == TRUE){
            return true;
        }
        else{
            echo "Erro Login Necessario<br>";
            echo "É possivel fazer o login <A href='../View/TelaLogin.php'>clicando aqui</A>.";
            exit();
        }
    }

}
new ValidacaoLogin();

