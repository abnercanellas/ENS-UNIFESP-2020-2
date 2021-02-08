<?php
session_start();
include('connection.php');

$TipoCadastro = mysqli_real_escape_string($connection, $_POST['sTipoCadastro']);

function alert($msg) {
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='home.php';
        </script>");
}

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
                /* INSERT INTO `Funcionario` (`ID`, `Nome`, `Login`, `Senha`, `TipoUsuarioID`, `SetorID`, `TipoEscalaID`, `TipoFeriasID`) VALUES ('0', 'Administrador', 'admin', 'admin', '1', '331', '1', '2') */
        $query = "INSERT INTO `Funcionario` (`ID`, `Nome`, `Login`, `Senha`, `TipoUsuarioID`, `SetorID`, `TipoEscalaID`, `TipoFeriasID`) VALUES ('{$ID}', '{$Nome}', '{$Login}', md5('{$Senha}'), '{$TipoUsuario}', '{$Setor}', '{$Escala}', '{$Ferias}')";
        
        $result = mysqli_query($connection, $query);

        alert($result);
        break;
    case '1':
        $Tipo = mysqli_real_escape_string($connection, $_POST['iTipoUsuario']);
        $query = "INSERT INTO `TipoUsuario` (`Tipo`) VALUES ('{$Tipo}')";
        
        $result = mysqli_query($connection, $query);

        alert($result);
        break;
    case '2':
        $NomeSetor = mysqli_real_escape_string($connection, $_POST['iSetor']);
        $CodSetor = mysqli_real_escape_string($connection, $_POST['iCodigoSetor']);
        $query = "INSERT INTO `Setor` (`ID`, `Nome`) VALUES ('{$CodSetor}', '{$NomeSetor}')";
        
        $result = mysqli_query($connection, $query);

        alert($result);
        break;
    case '3':
        $TipoPresenca = mysqli_real_escape_string($connection, $_POST['iPresenca']);
        $CodPresenca = mysqli_real_escape_string($connection, $_POST['iCodigoPresenca']);
        $query = "INSERT INTO `TipoPresenca` (`ID`, `Tipo`) VALUES ('{$CodPresenca}', '{$TipoPresenca}')";
        
        $result = mysqli_query($connection, $query);

        alert($result);
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