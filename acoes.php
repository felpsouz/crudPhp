<?php 
session_start();
require 'conexao.php';

if (isset($_POST['createUsuario'])){
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $dataNascimento = mysqli_real_escape_string($conexao, trim($_POST['dataNascimento']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';

    $sql = "INSERT INTO usuarios (nome, email, dataNascimento, senha) VALUES ('$nome', '$email', '$dataNascimento', '$senha')";

     mysqli_query($conexao, $sql);
    
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'Usuário criado com sucesso';
        header('location: index.php');
        exit;
    }
    else{
        header('location: index.php');
        $_SESSION['mensagem'] = 'Usuário não foi criado';
        exit;
    }
}

if (isset($_POST['updateUsuario'])){
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $dataNascimento = mysqli_real_escape_string($conexao, trim($_POST['dataNascimento']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));



    $sql = "UPDATE usuarios SET nome= '$nome', email= '$email', dataNascimento= '$dataNascimento'";

    if(!empty($senha)){
        $sql .= ", senha='" . password_hash($senha, PASSWORD_DEFAULT) ."'";
    }
    $sql .= "WHERE id = '$usuario_id'";

     mysqli_query($conexao, $sql);
    
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
        header('location: index.php');
        exit;
    }
    else{
        header('location: index.php');
        $_SESSION['mensagem'] = 'Usuário não foi atualizado';
        exit;
    }
}

if (isset($_POST['deleteUsuario'])){
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['deleteUsuario']);
    
    $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0){
        $_SESSION['mensagem'] = 'Usuário deletado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário nao foi deletado';
        header('Location: index.php');
        exit;
    }
}
?>