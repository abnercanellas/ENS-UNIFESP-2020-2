<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "newHeader.php";
    include_once("newHeader.php");
    include_once("connection.php");
    include_once('verifyAuthentication.php');
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
			    <?php
                            $query="SELECT c.ano, c.mes, c.dia, c.HoraInicio, c.HoraFim FROM celula c WHERE c.UsuarioId='{$_SESSION['usuario']}'";
			    $s = mysqli_query($connection, $query) or die(mysqli_error($connection));                                
                                while($r=mysqli_fetch_array($s)){
				                    $ano=$r['ano'];
				                    $mes=$r['mes'];
				                    $dia=$r['dia'];
				                    $horai=$r['HoraInicio'][0].$r['HoraInicio'][1].'h00';
				                    $horaf=$r['HoraFim'][0].$r['HoraFim'][1].'h00';
				                    echo "<p>$dia/$mes/$ano &nbsp; $horai - $horaf</p>";
				                }
			    ?>
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