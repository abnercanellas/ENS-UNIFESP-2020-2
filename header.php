<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/styles.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
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
