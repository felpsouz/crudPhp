<?php 
session_start();
require 'conexao.php';

if (isset($_POST['createUsuario'])){
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $dataNascimento = mysqli_real_escape_string($conexao, trim($_POST['dataNascimento']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, trim($_POST['senha'])) : '';

    $sql = "INSERT INTO usuarios (nome, email, dataNascimento, senha) VALUES ('$nome', '$email', '$dataNascimento', '$senha')";
    
}

?>