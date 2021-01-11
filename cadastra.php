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
                <div id="dCadastra">
                    <form action="addFunc.php" method="POST">
                        <label for="tFuncionario">Tipo: </label>

                        <input id="rfunc1" type="radio" name="tFuncionario1"
                            <?php if (isset($gender) && $gender=="funcionario") echo "checked";?>
                            value="2">
                        <label for="rfunc1"> Funcionário</label>

                        <input id="rSup1" type="radio" name="tFuncionario1"
                            <?php if (isset($gender) && $gender=="other") echo "checked";?>
                            value="1">
                        <label for="rSup1"> Supervisor</label>

                        <input id="rDir1" type="radio" name="tFuncionario1"
                            <?php if (isset($gender) && $gender=="male") echo "checked";?>
                            value="0">
                        <label for="rDir1"> Diretor</label>

                        <br>
                        <br>
                        <label for="dNome">Nome: </label>
                        <input id="dNome" name="nome1" type="text" placeholder="Fulano Silva">
                        <br>
                        <br>
                        <label for="dSetor">Setor: </label>
                        <input id="dSetor" name="setor1" type="text" placeholder="Recepção">
                        <br>
                        <br>
                        <label for="dFerias">Tipo de férias </label>
                        <input id="dFerias" name="ferias" type="text" placeholder="Completa">
                        <br>
                        <br>
                        <label for="dUsername">Tipo de expediente(h/dia): </label>
                        <input id="dUsername" name="username" type="text" placeholder="4">

                        <br><br>
                        <input class="botaoEnviar" type="submit" name="enviar1" value="Cadastrar">
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