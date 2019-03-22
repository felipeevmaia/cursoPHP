<?php
require_once("conecta.php");

function buscaUsuario($conexao,$email,$senha){
    $senhaMD5 = md5($senha);
    $query = "Select * from usuarios where email='{$email}' and senha='{$senhaMD5}'";
    $result = mysqli_query($conexao,$query);
    $usuario = mysqli_fetch_assoc($result);
    
    return $usuario;
}