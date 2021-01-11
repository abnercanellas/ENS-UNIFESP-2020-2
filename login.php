<?php
include('connection.php');

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['senha']);

if (($username && $password)) {
    $query = "SELECT id, Login FROM `usuario` WHERE Login = '{$username}' AND Senha = md5('{$password}')";
    echo $query;
    $result = mysqli_query($connection, $query);
    $row = mysqli_num_rows($result);

    if($row!=0){
        header('location: home.php');
        exit();
    }

    
} else {
    echo '<script>alert("Por favor, adicione Login e Senha"); location="index.php"; </script>';
}
