<?php
include('connection.php');

$TipoCadastro = mysqli_real_escape_string($connection, $_POST['sTipoConsulta']);

function alert($msg, $page) {
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='$page';
        </script>");
}

    /* $ID = mysqli_real_escape_string($connection, $_POST['iCpf']);
    $Nome = mysqli_real_escape_string($connection, $_POST['iNomeUsuario']);
    $Login = mysqli_real_escape_string($connection, $_POST['ilogin']);
    $Senha = mysqli_real_escape_string($connection, $_POST['iSenha']);
    $TipoUsuario= mysqli_real_escape_string($connection, $_POST['sTipoUsuario']);
    $Setor= mysqli_real_escape_string($connection, $_POST['sSetor']);
    $Escala= mysqli_real_escape_string($connection, $_POST['sTipoFerias']);
    $Ferias= mysqli_real_escape_string($connection, $_POST['sTipoEscala']); */

switch ($TipoCadastro) {
    case '0': //Funcionario
        $Nome = mysqli_real_escape_string($connection, $_POST['iNomeUsuario']);

        $query = "SELECT * FROM `Funcionario` WHERE Nome = '{$Nome}'";

        $s=mysqli_query($connection,$query);
            while($r = mysqli_fetch_array($s)){
                echo '<p>'.$r['Nome'].' '.$r['TipoUsuarioID'].' '.$r['SetorID'].' '.$r['TipoEscalaID'].' '.$r['TipoFeriasID'].'</p>';
        }

        break;

    case '1': //TipoUsuario
        
        break;

    case '2': //Setor
        
        break;

    case '3': //TipoPresenca
        
        break;
    
    default:
        
        break;
}