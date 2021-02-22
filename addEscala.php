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
        
            if(isset($_POST['eSetor']) && isset($_POST['eTipoEscala'])){
                $set = mysqli_real_escape_string($connection, $_POST['eSetor']);
                $esc = mysqli_real_escape_string($connection, $_POST['eTipoEscala']);
            
                $query_user = "SELECT * FROM `Usuario` WHERE `SetorId` = '{$set}' AND `TipoEscalaId` = '{$esc}'";
                $s = mysqli_query($connection, $query_user);
                
                while($r = mysqli_fetch_array($s)){
                    print_r($r);
                    echo "<br><br>";
                }
                
            }
        ?> 
    </body>
</html>