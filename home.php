<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "header.php";
    include_once("header.php");
    include('verifyAuthentication.php')
?>

<html>
    <head>
        <title>Home - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <div id="pag">
            <div id="conteudo"><!-- conteudo -->
                <div id="dEscala">
                    Aqui ficará a escala base do setor da pessoa logada e informações gerais

                </div>
            </div>
            <span class="clear"></span>
        </div>
    </body>
</html>


<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "footer.php";
   include_once("footer.php");
?>