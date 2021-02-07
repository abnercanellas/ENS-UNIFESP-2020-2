<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("header.php");
   include('verifyAuthentication.php');
   
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
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <div id="pag">
            <div id="conteudo"><!-- conteudo -->

                <div id="dHistorico">    
                    Quisque et quam augue. Donec eros lacus, ultrices ut enim in, mattis tempus ipsum. Sed ut ipsum rhoncus, aliquam risus eu, tempus justo. Ut semper massa fermentum lacus venenatis suscipit. Suspendisse ac ipsum dolor. Nunc euismod urna et cursus tempor. Cras mattis ac turpis non eleifend. Nulla fermentum erat vel tellus ultricies rutrum. Nam a massa ac sapien volutpat sodales. Mauris tempor nec felis a tincidunt. Pellentesque finibus lectus vel purus vehicula, et euismod orci tincidunt. Suspendisse pharetra et ipsum et auctor.

                    Integer risus libero, aliquet nec gravida ac, tristique id erat. Praesent pellentesque id enim ultricies vulputate. Etiam eleifend, dolor eu pulvinar fermentum, urna sapien suscipit orci, at viverra sapien dolor sed diam. Donec porta egestas ligula, ac pellentesque ex volutpat sed. Praesent lacinia malesuada ipsum ut gravida. Nam ligula leo, iaculis sit amet massa tempus, accumsan lobortis erat. Suspendisse placerat arcu sollicitudin ipsum consectetur mollis. Pellentesque sed ullamcorper ex. Nulla sit amet condimentum ante, ac varius odio. Integer nec enim accumsan, ornare est nec, tempus erat. Nam tempus, ante id pharetra elementum, diam nisi ultricies massa, in pellentesque felis ex ut erat. Fusce et luctus justo, eu tristique felis. Mauris venenatis velit ut felis malesuada, quis mollis leo euismod.
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