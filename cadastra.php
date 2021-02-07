<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("header.php");
   include_once("connection.php");
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
        <title>Cadastra - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">

        <script>
            function selectCheck(){
                document.getElementById("idformCadastra").style.display = "Block";
                var x = document.getElementById("idsTipoCadastro").value;
                var myDiv = document.getElementsByClassName("divs");
                for (i = 0; i < myDiv.length; i++) {
                    myDiv[i].style.display = "none";
                    
                }
                document.getElementById(x).style.display = "block";
            }
        </script>
    </head>
    <body>
        <div id="pag">
            <div id="conteudo"><!-- conteudo -->
                <div id="dCadastra">
                    <form action="addFunc.php" method="POST">
                        <div id="tipoCadastro"> <!-- escolhe o tipo de cadastroa realizar -->
                            <select name="sTipoCadastro" id="idsTipoCadastro" onchange="selectCheck()">
                                <option >---Selecione aqui---</option>
                                <option value="0">Usuário</option>
                                <option value="1">Tipo de usuário</option>
                                <option value="2">Setor</option>
                                <option value="3">Tipo de Presença</option>
                            </select>

                        </div>

                        <div> <!-- cadastros -->
                            <div id="0" class="divs"> <!-- cadastra usuario  -->
                                <label for="iNomeUsuario">Nome completo: </label>
                                <input id="idNomeUsuario" name="iNomeUsuario" type="text" placeholder="Fulano Silva"><br>
                                
                                <label for="iCpf">CPF (ou RNE): </label>
                                <input id="idCpf" name="iCpf" type="text" placeholder="00011122233"><br>

                                <label for="ilogin">Login: </label>
                                <input id="idlogin" name="ilogin" type="text" placeholder="FulanoSilva"><br>
                                
                                <label for="iSenha">Senha: </label>
                                <input id="idSenha" name="iSenha" type="password" placeholder="senha"><br>
                                
                                <label for="sTipoUsuario">Tipo de usuário: </label> <!-- select tipousuario -->
                                <select name="sTipoUsuario" id="idsTipoUsuario">
                                    <?php $s=mysqli_query($connection,"SELECT * FROM `tipousuario`");
                                        while($r = mysqli_fetch_array($s)){ ?>
                                            <option value="<?php echo $r['ID']?>"><?php echo $r['Tipo'];?></option>
                                    <?php } ?>
                                </select><br>

                                <label for="sSetor">Setor: </label> <!-- select setor -->
                                <select name="sSetor" id="idsSetor">
                                    <?php $s=mysqli_query($connection,"SELECT * FROM `setor`");
                                        while($r = mysqli_fetch_array($s)){ ?>
                                            <option value="<?php echo $r['ID']?>"><?php echo $r['Nome'];?></option>
                                    <?php } ?>
                                </select><br>

                                <label for="sTipoFerias">Tipo de férias: </label> <!-- select tipoferias -->
                                <select name="sTipoFerias" id="idsTipoFerias"> 
                                    <?php $s=mysqli_query($connection,"SELECT * FROM `tipoferias`");
                                        while($r = mysqli_fetch_array($s)){ ?>
                                            <option value="<?php echo $r['ID']?>"><?php echo $r['Tipo'];?></option>
                                    <?php } ?>
                                </select><br>
                                
                                <label for="sTipoEscala">Tipo de escala: </label> <!-- select tipoescala -->
                                <select name="sTipoEscala" id="idsTipoEscala">
                                    <?php $s=mysqli_query($connection,"SELECT * FROM `tipoescala`");
                                        while($r = mysqli_fetch_array($s)){ ?>
                                            <option value="<?php echo $r['ID']?>"><?php echo $r['TipoEscala'];?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div id="1" class="divs">
                                <label for="iTipoUsuario">Tipo de usuário: </label> <!-- cadastra tipousuario -->
                                <input id="idTipoUsuario" name="iTipoUsuario" type="text" placeholder="Diretoria"><br>
                            </div>

                            <div id="2" class="divs">
                                <label for="iSetor">Nome do setor: </label> <!-- cadastra setor -->
                                <input id="idiSetor" name="iSetor" type="text" placeholder="Administração"><br>
                                <label for="iCodigoSetor">Código do setor: </label>
                                <input id="idiCodigoSetor" name="iCodigoSetor" type="text" placeholder="3214"><br>
                            </div>

                            <div id="3" class="divs">
                                <label for="iPresenca">Tipo da presença: </label> <!-- cadastra presenca -->
                                <input id="idiPresenca" name="iPresenca" type="text" placeholder="Falta com laudo médico"><br>
                                <label for="iCodigoPresenca">Código da presença: </label>
                                <input id="idiCodigoPresenca" name="iCodigoPresenca" type="text" placeholder="3"><br>
                            </div>
                        </div>      

                        <input type="submit" value="Cadastrar" name="formCadastra" id="idformCadastra" style="display: none;">                  
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