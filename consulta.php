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
                <div id="dConsulta">
                    <form action="">
                            <label for="tFuncionario">Tipo: </label>

                            <input id="rfunc" type="radio" name="tFuncionario"
                                <?php if (isset($gender) && $gender=="funcionario") echo "checked";?>
                                value="1">
                            <label for="rfunc"> Funcionário</label>

                            <input id="rSup" type="radio" name="tFuncionario"
                                <?php if (isset($gender) && $gender=="other") echo "checked";?>
                                value="2">
                            <label for="rSup"> Supervisor</label>

                            <input id="rDir" type="radio" name="tFuncionario"
                                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                                value="0">
                            <label for="rDir"> Diretor</label>


                            <br>
                            <br>
                            <label for="lNome">Nome: </label>
                            <input id="dNome" name="username" type="text" placeholder="Fulano Silva">
                            
                        <br><br>
                        <input class="botaoEnviar" type="submit" name="enviar1" value="Buscar">
                    </form>
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