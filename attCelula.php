<?php
    include_once("connection.php");
    

    $sPresenca = mysqli_real_escape_string($connection, $_POST['sPresenca']);
    $idCels = mysqli_real_escape_string($connection, $_POST['idCels']);
    $query = "UPDATE `Celula` SET `TipoPresencaId` =  '{$sPresenca}' WHERE `Id` ='{$idCels}'";
    $result = mysqli_query($connection, $query);
    header("location: home.php");
?>