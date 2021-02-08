<?php
session_start();
include('connection.php');

$TipoCadastro = mysqli_real_escape_string($connection, $_POST['sTipoCadastro']);

function alert($msg, $page) {
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='$page';
        </script>");
}

switch ($TipoCadastro) {
    case '0': //Funcionario
        $ID = mysqli_real_escape_string($connection, $_POST['iCpf']);
        $Nome = mysqli_real_escape_string($connection, $_POST['iNomeUsuario']);
        $Login = mysqli_real_escape_string($connection, $_POST['ilogin']);
        $Senha = mysqli_real_escape_string($connection, $_POST['iSenha']);
        $TipoUsuario= mysqli_real_escape_string($connection, $_POST['sTipoUsuario']);
        $Setor= mysqli_real_escape_string($connection, $_POST['sSetor']);
        $Escala= mysqli_real_escape_string($connection, $_POST['sTipoFerias']);
        $Ferias= mysqli_real_escape_string($connection, $_POST['sTipoEscala']);

        $query = "SELECT * FROM `Funcionario` WHERE ID = '{$ID}'";
        $row_id = mysqli_num_rows(mysqli_query($connection, $query));
        $query = "SELECT * FROM `Funcionario` WHERE Login = '{$Login}'";
        $row_login = mysqli_num_rows(mysqli_query($connection, $query));

        // alertas de dados repetidos
        if($row_id > 0 && $row_login > 0){
            alert('CPF: '.$ID.' e Login: '.$Login.' já cadastrados. \nPor favor, altere os dados e tente novamente.', 'cadastra.php');
        } elseif ($row_id > 0) {
            alert('CPF: '.$ID.' já cadastrado. \nPor favor, altere-o e tente novamente.', 'cadastra.php');
        } elseif ($row_login > 0) {
            alert('Login: '.$Login.' já cadastrado. \nPor favor, altere-o e tente novamente.', 'cadastra.php');
        }
        // inserindo dados na tabela Funcionario
        else{
            $query = "INSERT INTO `Funcionario` (`ID`, `Nome`, `Login`, `Senha`, `TipoUsuarioID`, `SetorID`, `TipoEscalaID`, `TipoFeriasID`) VALUES ('{$ID}', '{$Nome}', '{$Login}', md5('{$Senha}'), '{$TipoUsuario}', '{$Setor}', '{$Escala}', '{$Ferias}')";  
            $result = mysqli_query($connection, $query);
            alert($result, 'home.php');
        }
        break;

    case '1': //TipoUsuario
        $Tipo = mysqli_real_escape_string($connection, $_POST['iTipoUsuario']);
        
        $query = "SELECT * FROM `TipoUsuario` WHERE Tipo = '{$Tipo}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('O tipo de usuário '.$Tipo.' já existe.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `TipoUsuario` (`Tipo`) VALUES ('{$Tipo}')";
            $result = mysqli_query($connection, $query);
            alert($result, 'home.php');
        }
        break;

    case '2': //Setor
        $NomeSetor = mysqli_real_escape_string($connection, $_POST['iSetor']);
        $CodSetor = mysqli_real_escape_string($connection, $_POST['iCodigoSetor']);

        $query = "SELECT * FROM `Setor` WHERE ID = '{$CodSetor}' OR Nome = '{$NomeSetor}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Este setor já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `Setor` (`ID`, `Nome`) VALUES ('{$CodSetor}', '{$NomeSetor}')";
            $result = mysqli_query($connection, $query);
            alert($result, 'home.php');
        }
        break;

    case '3': //TipoPresenca
        $TipoPresenca = mysqli_real_escape_string($connection, $_POST['iPresenca']);
        $CodPresenca = mysqli_real_escape_string($connection, $_POST['iCodigoPresenca']);
        
        $query = "SELECT * FROM `TipoPresenca` WHERE ID = '{$CodPresenca}' OR Tipo = '{$TipoPresenca}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Este tipo de presença já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `TipoPresenca` (`ID`, `Tipo`) VALUES ('{$CodPresenca}', '{$TipoPresenca}')";
            $result = mysqli_query($connection, $query);
            alert($result, 'home.php');
        }
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