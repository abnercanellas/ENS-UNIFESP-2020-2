<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('SENHA', '');
    define('DB', 'insertion');

    $connection = mysqli_connect(HOST,USER,SENHA,DB) or die('Não foi possivel conectar');
