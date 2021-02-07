<?php
session_start();
include('connection.php');

$TipoCadastro = mysqli_real_escape_string($connection, $_POST['sTipoCadastro']);

switch ($TipoCadastro) {
    case '0':
        $ID = mysqli_real_escape_string($connection, $_POST['iCpf']);
        $Nome = mysqli_real_escape_string($connection, $_POST['iNomeUsuario']);
        $Login = mysqli_real_escape_string($connection, $_POST['ilogin']);
        $Senha = mysqli_real_escape_string($connection, $_POST['iSenha']);
        $TipoUsuario= mysqli_real_escape_string($connection, $_POST['sTipoUsuario']);
        $Setor= mysqli_real_escape_string($connection, $_POST['sSetor']);
        $Escala= mysqli_real_escape_string($connection, $_POST['sTipoFerias']);
        $Ferias= mysqli_real_escape_string($connection, $_POST['sTipoEscala']);
                /* INSERT INTO `funcionario` (`ID`, `Nome`, `Login`, `Senha`, `TipoUsuarioID`, `SetorID`, `TipoEscalaID`, `TipoFeriasID`) VALUES ('0', 'Administrador', 'admin', 'admin', '1', '331', '1', '2') */
        $query = "INSERT INTO `funcionario` (`ID`, `Nome`, `Login`, `Senha`, `TipoUsuarioID`, `SetorID`, `TipoEscalaID`, `TipoFeriasID`) VALUES ('{$ID}', '{$Nome}', '{$Login}', md5('{$Senha}'), '{$TipoUsuario}', '{$Setor}', '{$Escala}', '{$Ferias}')";
        
        $result = mysqli_query($connection, $query);

        echo "<script>alert('{$result}'); </script>";

        header('location: home.php');
        break;
    case '1':
    
        break;
    case '2':
    
        break;
    case '3':

        break;
    default:
        
        break;
}
/* $password = mysqli_real_escape_string($connection, $_POST['senha']);

$query = "SELECT id, Login FROM `usuario` WHERE Login = '{$username}' AND Senha = md5('{$password}')";
echo $query;
$result = mysqli_query($connection, $query);
$row = mysqli_num_rows($result);

if($row==1){
    $_SESSION['usuario'] = $username; 
    header('location: home.php');
    exit();
}else{
    $_SESSION['n_autenticado'] = true;
    header('Location: index.php');
}
 */