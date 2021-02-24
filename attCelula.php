<?php
    include_once("connection.php");
    echo "UPDATE `Celula` SET `TipoPresencaId` =  '{$_POST['sPresenca']}' WHERE `Id` ='{$_POST['idCel']}";
    $query = "UPDATE `Celula` SET `TipoPresencaId` =  '{$_POST['sPresenca']}' WHERE `Id` ='{$_POST['idCel']}'";
    $result = mysqli_query($connection, $query);
?>