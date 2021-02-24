<?php
    //user: b53a813becf7ae
    //password: 0661d62b
    //Host: us-cdbr-east-03.cleardb.com
    //port: 3306
    ///heroku_c12980461cab3cd?reconnect=true
    // OvRAlcc6Gn
    // Database: insertion_1
    // Username: abnercanellas_1
    // Email: abnercanellas@gmail.com

    /* Usar este em localhost */

    /* define('HOST', 'localhost');
    define('USER', 'root');
    define('SENHA', '');
    define('DB', 'insertion');
    $connection = mysqli_connect(HOST,USER,SENHA,DB) or die('Não foi possivel conectar'); */

    define('HOST', 'remotemysql.com');
    define('USER', 's9aMtIbeoZ');
    define('SENHA', 'OvRAlcc6Gn');
    define('DB', 's9aMtIbeoZ');
    define('PORT', '3306');
    $connection = mysqli_connect(HOST,USER,SENHA,DB,PORT) or die('Não foi possivel conectar');
   


    /* Usar este no no deploy */

    /* define('HOST', 'us-cdbr-east-03.cleardb.com');
    define('USER', 'b53a813becf7ae');
    define('SENHA', '0661d62b');
    define('DB', 'heroku_c12980461cab3cd');
    define('PORT', '3306');
    $connection = mysqli_connect(HOST,USER,SENHA,DB,PORT) or die('Não foi possivel conectar'); */
?>

