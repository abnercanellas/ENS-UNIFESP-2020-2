<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <header><!--menu superior -->
            <div id="navegacao">
                <a id="aHome" <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "home.php") echo 'class="pagAtual"';?> href="./home.php">HOME</a>
                <a id="aAjuda" <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "ajuda.php") echo 'class="pagAtual"';?> href="./ajuda.php">AJUDA</a>
                <a id="aSobre" <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "sobre.php") echo 'class="pagAtual"'?> href="./sobre.php">SOBRE</a>
            </div>
            <div id="logoFoto"><!-- logo e foto -->
                <!-- <img src="imgs/avatar.png" alt="avatar"> -->
                <img src="imgs/txtNomeUnifesp.png" alt="avatar">
            </div>
            <script>
                var set= function(N,M){
                    var x = document.getElementById(N);
                    var d = document.getElementById(M);
                    d.style.display = "block";
                    x.style.textAlign = "right";
                    x.style.fontWeight = "bolder";
                    x.style.color = "#4cae4c";
                }  
                var reset = function(N,M){
                    var x = document.getElementById(N);
                    var d = document.getElementById(M);
                    d.style.display = "none";
                    x.style.textAlign = "left";
                    x.style.fontWeight = "normal";
                    x.style.color = "#333";
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
        </header>
    </body>
</html>
