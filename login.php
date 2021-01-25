<?php
session_start();
include('connection.php');

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['senha']);

if (($username && $password)) {
    $query = "SELECT ID, Login, TipoUsuarioID FROM `Funcionario` WHERE Login = '{$username}' AND Senha = md5('{$password}')";
    echo $query;
    $result = mysqli_query($connection, $query);
    $row = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);

    if($row==1){
        $_SESSION['usuario'] = $username;
        $_SESSION['tipoUserId'] = $data['TipoUsuarioID'];
        header('location: home.php');
        exit();
    }else{
        $_SESSION['n_autenticado'] = true;
        header('Location: index.php');
    }

    
} else {
    echo '<script>alert("Por favor, adicione Login e Senha"); location="index.php"; </script>';
}
