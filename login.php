<?php
session_start();
use Emanuelaguiar\LoginPhp\Database\ConexaoMySQL;

require "vendor/autoload.php";

$pdo = ConexaoMySQL::getInstance();

$email = $_POST['email'] ?? '';
$pass = $_POST['senha'] ?? '';

$sql = "SELECT * FROM users WHERE email = :email";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    "email" => $email
]);

$user = $stmt->fetch();


if(!$user){
    $_SESSION['flash_message'] = "Usuário e/ou senha inválido(s)";
    header('location: form-login.php');
}
    
if(!password_verify($pass, $user->password) ){
    $_SESSION['flash_message'] = "Usuário e/ou senha inválido(s)";
    header('location: form-login.php');
}else{
    $_SESSION['user'] = $user;
    header('location: painel.php');
}
