<?php
session_start();
?>

<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "newHeader.php";
    include_once("newHeader.php");
?>

<html>
    
    <head>
        <title>Login - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <header>
        </header>

        <div class="card mx-auto" style="margin-top:30vh; width: 600px;">
            <div class="card-header ">
                Painel de Login
            </div>
            <div class="card-body">
                <form id="formLogin" method="POST" action="login.php">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="usernameId">Username: </label>
                        <input class="form-control" id="usernameId" name="username" type="text" placeholder="Usuário">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="senhaId">Senha: </label>
                        <input class="form-control" id="senhaId" name="senha" type="password" placeholder="Senha">
                    </div>
                    <?php
                        if(isset($_SESSION['n_autenticado'])):
                    ?>    
                        <div class="formGrup, error">
                            <span>Verifique seu login e Senha</span>
                        </div>
                    <?php
                        endif;
                        unset($_SESSION['n_autenticado']);
                    ?> 
                    <div class="formGroupo" align="right">
                        <div>
                            <input  class="btn btn-primary" type="submit" name="enviar" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="margin-top:32.7vh"></div>

    </body>
</html>

<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "footer.php";
   include_once("footer.php");
?>