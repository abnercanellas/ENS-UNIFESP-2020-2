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
            $vinc  = mysqli_fetch_array(mysqli_query($connection,"SELECT Vinc  FROM `Vinculo`     WHERE `Id` = {$r['VinculoId']}"))['Vinc'];
            $cat   = mysqli_fetch_array(mysqli_query($connection,"SELECT Cat   FROM `Categoria`   WHERE `Id` = {$r['CategoriaId']}"))['Cat'];
            $tipoU = mysqli_fetch_array(mysqli_query($connection,"SELECT Tipo  FROM `TipoUsuario` WHERE `Id` = {$r['TipoUsuarioId']}"))['Tipo'];
            $cond  = mysqli_fetch_array(mysqli_query($connection,"SELECT Cond  FROM `Condicao`    WHERE `Id` = {$r['CondicaoId']}"))['Cond'];
            $tipoS = mysqli_fetch_array(mysqli_query($connection,"SELECT Nome  FROM `Setor`       WHERE `Id` = {$r['SetorId']}"))['Nome'];
            $tipoE = mysqli_fetch_array(mysqli_query($connection,"SELECT Tipo  FROM `TipoEscala`  WHERE `Id` = {$r['TipoEscalaId']}"))['Tipo'];
            $tipoF = mysqli_fetch_array(mysqli_query($connection,"SELECT Nome  FROM `TipoFerias`  WHERE `Id` = {$r['TipoFeriasId']}"))['Nome'];
            echo '

<li>
'.$r['Nome'].'
<ul>
	<li>CPF(CRNM): '.$r['Cpf'].'</li>
	<li>RF/RE: '.$r['RfRe'].'</li>
	<li>COREN: '.$r['Coren'].'</li>
	<li>Vínculo: '.$vinc.'</li>
	<li>Categoria: '.$cat.'</li>
	<li>Tipo de usuário: '.$tipoU.'</li>
	<li>Condição: '.$cond.'</li>
	<li>Setor: '.$tipoS.'</li>
	<li>Escala: '.$tipoE.'</li>
	<li>Férias: '.$tipoF.'</li>
</ul>
</li>';
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
                    case '0': //Nome
                        $n = mysqli_real_escape_string($connection, $_POST['iNomeUsuario']);
                        $query = "SELECT * FROM `Usuario` WHERE `Nome` LIKE '%{$n}%'";
                        gather($connection,$query);                        
                        break;
                
                    case '1': //CPF
                        $n = mysqli_real_escape_string($connection, $_POST['iCpf']);
                        $query = "SELECT * FROM `Usuario` WHERE `Cpf` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;
                    
                    case '2': //RF/RE
                        $n = mysqli_real_escape_string($connection, $_POST['iRfRe']);
                        $query = "SELECT * FROM `Usuario` WHERE `RfRe` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;
                    
                    case '3': //COREN
                        $n = mysqli_real_escape_string($connection, $_POST['iCoren']);
                        $query = "SELECT * FROM `Usuario` WHERE `Coren` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;

                    case '4': //Vínculo
                        $n = mysqli_real_escape_string($connection, $_POST['sVinculo']);
                        $query = "SELECT * FROM `Usuario` WHERE `VinculoId` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;

                    case '5': //Categoria
                        $n = mysqli_real_escape_string($connection, $_POST['sCategoria']);
                        $query = "SELECT * FROM `Usuario` WHERE `CategoriaId` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;
                        
                    case '6': //TipoUsuario
                        $n = mysqli_real_escape_string($connection, $_POST['sTipoUsuario']);
                        $query = "SELECT * FROM `Usuario` WHERE `TipoUsuarioId` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;

                    case '7': //Condição
                        $n = mysqli_real_escape_string($connection, $_POST['sCondicao']);
                        $query = "SELECT * FROM `Usuario` WHERE `CondicaoId` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;
                
                    case '8': //Nível de Acesso
                        $n = mysqli_real_escape_string($connection, $_POST['sAcesso']);
                        $query = "SELECT * FROM `Usuario` WHERE `TipoUsuarioId` IN (SELECT `Id` FROM `TipoUsuario` WHERE `Acesso` LIKE '%{$n}%')";
                        gather($connection,$query); 
                        break;

                    case '9': //Bloco
                        $n = mysqli_real_escape_string($connection, $_POST['sBloco']);
                        $query = "SELECT * FROM `Usuario` WHERE `SetorId` IN (SELECT `Id` FROM `Setor` WHERE `BlocoId` LIKE '%{$n}%')";
                        gather($connection,$query); 
                        break;
                        
                    case '10': //Setor
                        $n = mysqli_real_escape_string($connection, $_POST['sSetor']);
                        $query = "SELECT * FROM `Usuario` WHERE `SetorId` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;

                    case '11': //Tipo de Escala
                        $n = mysqli_real_escape_string($connection, $_POST['sTipoEscala']);
                        $query = "SELECT * FROM `Usuario` WHERE `TipoEscalaId` LIKE '%{$n}%'";
                        gather($connection,$query); 
                        break;
                }
            }
        ?> 
    </body>
</html>