<?php 
require_once ("banco-usuario.php");
require_once ("logica-usuario.php");
$email = mysqli_real_escape_string($conexao, $_POST["email"]);

$usuario = buscaUsuario($conexao, $email,$_POST["senha"]);

if ($usuario == NULL) {
    $_SESSION["danger"] = "Usuário ou senha inválido.";
    header("Location: index.php");
} else {
    $_SESSION["success"] = "Usuário logado com sucesso.";
    logaUsuario($usuario["email"]);
    header("Location: index.php");
}
die();