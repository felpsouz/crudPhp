<?php 
define('HOST', 'localhost:3306');
define('USUARIO', 'root');
define('SENHA', 'admin');
define('DB', 'crud');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>