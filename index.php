<?php
session_start();
?>
<html>
    <head>
        <title>Login - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <header><!--menu superior -->
            <div id="navegacao">
                <div>Sistema de Escalas</div>
            </div>
            <div id="logoFoto"><!-- logo e foto -->
                <img src="imgs/txtNomeUnifesp.png" alt="UNIFESP">
            </div>
            <span style="clear: both;"></span>
        </header>

        <div id="pag">
            <form id="formLogin" method="POST" action="login.php">
                <fieldset class="noBorder">
                    <legend id="legendaLogin">Painel de Login</legend>
                    <div id="conteudoForm">
                        <div class="formGrupo">
                            <label for="usernameId">Username: </label>
                            <input id="usernameId" name="username" type="text" placeholder="Usuário">
                        </div>
                        <div class="formGrupo">
                            <label for="senhaId">Senha: </label>
                            <input id="senhaId" name="senha" type="password" placeholder="Senha">
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
                                <input  class="botaoEnviar" type="submit" name="enviar" value="Login">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </body>
</html>

<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "footer.php";
   include_once("footer.php");
?>