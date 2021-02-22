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
            
            <div class="card my-3" style="width: 100%;">
                <div class="card-header ">
                    '.$r['Nome'].'
                    <i class="fas fa-user-edit float-right"></i>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">CPF(CRNM): '.$r['Cpf'].'</li>
                        <li class="list-group-item">RF/RE: '.$r['RfRe'].'</li>
                        <li class="list-group-item">COREN: '.$r['Coren'].'</li>
                        <li class="list-group-item">Vínculo: '.$vinc.'</li>
                        <li class="list-group-item">Categoria: '.$cat.'</li>
                        <li class="list-group-item">Tipo de usuário: '.$tipoU.'</li>
                        <li class="list-group-item">Condição: '.$cond.'</li>
                        <li class="list-group-item">Setor: '.$tipoS.'</li>
                        <li class="list-group-item">Escala: '.$tipoE.'</li>
                        <li class="list-group-item">Férias: '.$tipoF.'</li>
                    </ul>
                </div>
            </div>
            
            ';
        }
    }else{
        echo "nenhuma correspondencia encontrada";
    }
}
?>


<html>
    <head>
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