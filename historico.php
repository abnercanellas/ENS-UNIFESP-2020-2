<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "newHeader.php";
   include_once("newHeader.php");
   
   $required_level = 1; //diretoria
   if($_SESSION['tipoUserId'] != $required_level) {
        echo '<script>
                alert("ACESSO NEGADO\nVocê não possui o cargo necessário para acessar essa função");
                window.location.href="home.php";
            </script>'; 
   }
?>

<html>
    <head>
        <title>Historico - Escalas</title>
        <meta charset="UTF-8">
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

                        <div id="dHistorico">    
                            Historico de presenças do usuário logado
                        </div>

                    </div>
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