<?php
    include_once("connection.php");
    function alert($msg, $page) {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('$msg');
                window.location.href='$page';
            </script>");
    }

    $sPresenca = mysqli_real_escape_string($connection, $_POST['sPresenca']);
    $idCels = mysqli_real_escape_string($connection, $_POST['idCels']);
    $query = "UPDATE `Celula` SET `TipoPresencaId` =  '{$sPresenca}' WHERE `Id` ='{$idCels}'";
    $result = mysqli_query($connection, $query);
    alert("$sPresenca cadastrada com sucesso!", 'home.php');
?>