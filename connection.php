<?php
    //user: b53a813becf7ae
    //password: 0661d62b
    //Host: us-cdbr-east-03.cleardb.com
    //port: 3306
    ///heroku_c12980461cab3cd?reconnect=true
    //u1e_y?r2<Bz6v#0c

    /* Usar este em localhost */

    /* define('HOST', 'localhost');
    define('USER', 'root');
    define('SENHA', '');
    define('DB', 'insertion');
    $connection = mysqli_connect(HOST,USER,SENHA,DB) or die('Não foi possivel conectar'); */

    define('HOST', 'localhost');
    define('USER', 'root');
    define('SENHA', 'u1e_y?r2<Bz6v#0c');
    define('DB', 'id16240752_insertion');
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

