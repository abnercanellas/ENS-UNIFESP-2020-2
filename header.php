<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
        <script>
                var set= function(N,M){
                    var x = document.getElementById(N);
                    var d = document.getElementById(M);
                    x.style.textAlign = "right";
                    x.style.fontWeight = "bolder";
                    x.style.borderColor = "#4cae4c";
                    x.style.borderWidth =" 2px";
                }  
                var reset = function(N,M){
                    var x = document.getElementById(N);
                    var d = document.getElementById(M);
                    x.style.textAlign = "left";
                    x.style.fontWeight = "normal";
                    x.style.borderColor = "#333";
                    x.style.borderWidth = "1px";
                }
                var animaMenu = function(div){
                    reset('lEscala','dEscala');
                    reset('lConsulta','dConsulta');
                    reset('lCadastra','dCadastra');
                    reset('lHistorico','dHistorico');       
                    switch(div){
                        case 'dEscala':
                            set('lEscala','dEscala');
                        break;
                        case 'dConsulta':
                            set('lConsulta','dConsulta');
                        break;
                        case 'dCadastra':
                            set('lCadastra','dCadastra');
                        break;
                        case 'dHistorico':
                            set('lHistorico','dHistorico');
                        break;
                    }
                }
            </script>
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
