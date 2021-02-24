<?php
    function initialDate(){
        date_default_timezone_set('America/Sao_Paulo');
        $d = date("d", time());
        $day = date("Y-m-d", time());
        if($d <= 15) {
            $day=strftime("%Y-%m-%d", strtotime("$day -1 month"));
        }
        $day=strftime("%Y-%m-%d", strtotime("$day -$d day"));
        $day=strftime("%Y-%m-%d", strtotime("$day +16 day"));
        return $day;
    }
    
    function finalDate(){
        date_default_timezone_set('America/Sao_Paulo');
        $d = date("d", time());
        $day = date("Y-m-d", time());
        if($d >= 16) {
            $day=strftime("%Y-%m-%d", strtotime("$day +1 month"));
        }
        $day=strftime("%Y-%m-%d", strtotime("$day -$d day"));
        $day=strftime("%Y-%m-%d", strtotime("$day +15 day"));
        return $day;
    }
?>


<html>
    <head>
    </head>
    <body>
        <?php if(isset($_POST['eSetor']) && isset($_POST['eTipoEscala'])): ?>
            <div id="idTabela">
                <table style="width:100%">
                    <tr>
                        <th>RF/RE</th>
                        <th>Nome</th>
                        <th>Cat.</th>
                        <th>COREN</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                        <?php
                            $nDays = 0;
                            $dayinit = initialDate();
                            $dayend = finalDate();
                            $dayend = strftime("%Y-%m-%d", strtotime("$dayend +1 day"));
                            while($dayinit != $dayend){
                                $d = DateTime::createFromFormat("Y-m-d", $dayinit);?>
                                <th><?php echo $d->format("d") ?></th>
                                <?php
                                $dayinit=strftime("%Y-%m-%d", strtotime("$dayinit +1 day"));
                                $nDays++;
                            }
                        ?>
                    </tr>
                    
                    <?php
                    $set = mysqli_real_escape_string($connection, $_POST['eSetor']);
                    $esc = mysqli_real_escape_string($connection, $_POST['eTipoEscala']);
                    
                    $dayinit=initialDate();
                    $query_escala = "SELECT Id FROM `Escalas` WHERE `DataInicio` = '{$dayinit}'";
                    $e = mysqli_query($connection, $query_escala);
                    $idescala = mysqli_fetch_array($e);
                    
                    if(mysqli_num_rows($e) == 0){
                        $query_create = "INSERT INTO `Escalas` ( `DataInicio`, `DataFim`) VALUES ('{$dayinit}', '{$dayend}');";
                        mysqli_query($connection,$query_create);
                        $ce = mysqli_query($connection, $query_escala);
                        $idescala = mysqli_fetch_array($ce);
                        $qu = "SELECT Cpf FROM `Usuario`";
                        $nu = mysqli_query($connection, $qu);
                        while($nc = mysqli_fetch_array($nu)){
                            $cont = $dayinit;
                            for($i=0; $i<$nDays;$i++){
                                mysqli_query($connection,"INSERT INTO `Celula` (`DataC`, `HoraInicio`, `HoraFim`, `EscalasId`, `UsuarioId`, `SetorId`) VALUES ('$cont', '06:30:00.000000', '15:30:00.000000', {$idescala['Id']}, '{$nc['Cpf']}', $set)") ;
                                $cont=strftime("%Y-%m-%d", strtotime("$cont +1 day"));
                            }
                        }
                    }
                    $query_user = "SELECT * FROM `Usuario` WHERE `SetorId` LIKE '{$set}' AND `TipoEscalaId` LIKE '{$esc}'";
                    $nUser = mysqli_query($connection, $query_user);
                    if(mysqli_num_rows(mysqli_query($connection, $query_user)) > 0){
                        while($user = mysqli_fetch_array($nUser)){
                            $rfre = $user['RfRe'];
                            $nome = $user['Nome'];
                            $cat = mysqli_fetch_array(mysqli_query($connection,"SELECT Sigla FROM `Categoria` WHERE `Id` = {$user['CategoriaId']}"))['Sigla'];
                            $coren = $user['Coren'];
                            $entrada =  mysqli_fetch_array(mysqli_query($connection,"SELECT HoraInicio FROM `Celula` WHERE `UsuarioId` = '{$user['Cpf']}' AND `EscalasId` = '{$idescala['Id']}' AND `DataC` = '{$dayinit}'"))['HoraInicio'];
                            $saida =  mysqli_fetch_array(mysqli_query($connection,"SELECT HoraFim FROM `Celula` WHERE `UsuarioId` = '{$user['Cpf']}' AND `EscalasId` = '{$idescala['Id']}' AND `DataC` = '{$dayinit}'"))['HoraFim'];
                            $entrada = substr($entrada,0,5);
                            $saida = substr($saida,0,5);
                            echo "<tr>
                            <td>$rfre</td>
                            <td>$nome</td>
                            <td>$cat</td>
                            <td>$coren</td>
                            <td>$entrada</td>
                            <td>$saida</td>
                            ";
                            $cont = $dayinit;
                            for($i=0; $i<$nDays;$i++){
                                $g = mysqli_query($connection,"SELECT `TipoPresencaId` FROM `Celula` WHERE `UsuarioId` = '{$user['Cpf']}' AND `DataC` = '{$cont}'");
                                $h = mysqli_fetch_array($g);
                                $h = $h['TipoPresencaId']==NULL ?  8 : $h['TipoPresencaId'];
                                $t = mysqli_fetch_array(mysqli_query($connection,"SELECT `Sigla` FROM `tipopresenca` WHERE `Id`= {$h}"));
                                ?>
                                <td><?php echo $t['Sigla']?></td> 
                                <?php
                                $cont=strftime("%Y-%m-%d", strtotime("$cont +1 day"));
                                
                            }
                            echo '</tr>';
                        }
                    }else{
                        echo "Nenhum funcionário na escala selecionanda.\n";
                    }
                    ?>
                </table>
            </div>
        <?php endif; ?>
    </body>
</html>