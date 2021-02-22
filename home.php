<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "newHeader.php";
    include_once("newHeader.php");
?>

<html>
    <head>
        <title>Home - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="menu" class="bg-a1 shadow-sm sidebar-sticky">
                    <?php
                        require_once('menu.php');
                    ?>
                </div>
                <div id="pag">
                    <div id="conteudo"><!-- conteudo -->
                        <div id="dEscala">
                            Aqui ficará a escala base do setor da pessoa logada e informações gerais

                        </div>
                    </div>
                    <span class="clear"></span>
                </div>
            </div>
        </div>
    </body>
</html>


<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "footer.php";
   include_once("footer.php");
?>