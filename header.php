<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <header><!--menu superior -->
            <div id="navegacao">
                <a id="aHome" <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "home.php") echo 'class="pagAtual"';?> href="./home.php">HOME</a>
                <a id="aConsulta" <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "consulta.php") echo 'class="pagAtual"'?> href="./consulta.php">CONSULTA</a>
                <a id="aCadastra" <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "cadastra.php") echo 'class="pagAtual"'?> href="./cadastra.php">CADASTRA</a>
                <a id="aHistorico" <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "historico.php") echo 'class="pagAtual"'?> href="./historico.php">HISTORICO</a>
            </div>

            <div id="logoFoto"><!-- logo e foto -->
                <img src="imgs/txtNomeUnifesp.png" alt="unifesp">
            </div>
            <div>
                <a href="logout.php">
                    <img id="avatar" src="./imgs/avatar.png" alt="Sair" title="Sair">
                </a>
            </div>
        </header>
    </body>
</html>
