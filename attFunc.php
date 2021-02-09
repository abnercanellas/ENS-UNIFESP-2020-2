<?php

function alert($msg, $page) {
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='$page';
        </script>");
}
function gather($connection,$query){
    $s=mysqli_query($connection,$query);
    if(mysqli_num_rows($s)>0){
        while($r = mysqli_fetch_array($s)){
            $tipoU = mysqli_fetch_array(mysqli_query($connection,"SELECT Tipo  FROM `tipousuario` WHERE `ID` = {$r['TipoUsuarioID']}"))['Tipo'];
            $tipoS = mysqli_fetch_array(mysqli_query($connection,"SELECT Nome  FROM `setor` WHERE `ID` = {$r['SetorID']}"))['Nome'];
            $tipoE = mysqli_fetch_array(mysqli_query($connection,"SELECT TipoEscala  FROM `tipoescala` WHERE `ID` = {$r['TipoEscalaID']}"))['TipoEscala'];
            $tipoF = mysqli_fetch_array(mysqli_query($connection,"SELECT Tipo  FROM `tipoferias` WHERE `ID` = {$r['TipoFeriasID']}"))['Tipo'];
            echo '<p>Nome: '.$r['Nome'].' <br> -  CPF/COREN: '.$r['ID'].'<br> -  Nivel de acesso: '.$tipoU.'<br> -  Setor: '.$tipoS.'<br> -  Escala: '.$tipoE.'<br> -  Férias: '.$tipoF.'.</p>';
        }
    }else{
        echo "nenhuma correspondencia encontrada";
    }
}
?>


<html>
    <head>
<!-- /* $ID = mysqli_real_escape_string($connection, $_POST['iCpf']);
            $Nome = mysqli_real_escape_string($connection, $_POST['iNomeUsuario']);
            $Login = mysqli_real_escape_string($connection, $_POST['ilogin']);
            $Senha = mysqli_real_escape_string($connection, $_POST['iSenha']);
            $TipoUsuario= mysqli_real_escape_string($connection, $_POST['sTipoUsuario']);
            $Setor= mysqli_real_escape_string($connection, $_POST['sSetor']);
            $Escala= mysqli_real_escape_string($connection, $_POST['sTipoFerias']);
            $Ferias= mysqli_real_escape_string($connection, $_POST['sTipoEscala']); */ -->
    </head>
    <body>
        <?php
        
            if(isset($_POST['formConsulta'])){
            $TipoCadastro = mysqli_real_escape_string($connection, $_POST['sTipoConsulta']);
                switch ($TipoCadastro) {
                    case '0': //Funcionario
                        $n = mysqli_real_escape_string($connection, $_POST['iNomeUsuario']);
                        $query = "SELECT * FROM `Funcionario` WHERE `Nome` LIKE '%{$n}%'";
                        gather($connection,$query);                        
                        break;
                
                    case '1': //TipoUsuario
                        $n = mysqli_real_escape_string($connection, $_POST['iCpf']);
                        $query = "SELECT * FROM `Funcionario` WHERE `ID` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;
                
                    case '2': //Setor
                        $n = mysqli_real_escape_string($connection, $_POST['sTipoUsuario']);
                        $query = "SELECT * FROM `Funcionario` WHERE `TipoUsuarioID` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;
                
                    case '3': //TipoPresenca
                        $n = mysqli_real_escape_string($connection, $_POST['sSetor']);
                        $query = "SELECT * FROM `Funcionario` WHERE `SetorID` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;
                }
            }
        ?> 
    </body>
</html>