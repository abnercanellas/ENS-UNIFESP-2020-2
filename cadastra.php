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
        <title>Cadastros - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">

        <script>
            function selectCheck(){
                // document.getElementById("idformCadastra").style.display = "Block";
                var x = document.getElementById("idsTipoCadastro").value;
                if (x >= 0) {
                    document.getElementById("idformCadastra").style.display = "Block";    
                } else {
                    document.getElementById("idformCadastra").style.display = "none";
                }                
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
                    <form class="m-0" action="addFunc.php" method="POST">
                        <legend>Cadastro de:</legend>
                        <div id="tipoCadastro"> <!-- escolhe o tipo de cadastro a realizar -->
                            <select class="form-select my-3" name="sTipoCadastro" id="idsTipoCadastro" onchange="selectCheck()">
                                <option selected>Selecione aqui</option>
                                <option value="0">Usuário</option>
                                <option value="1">Tipo de usuário</option>
                                <option value="2">Setor</option>
                                <option value="3">Tipo de Presença</option>
                            </select>
                        </div>

                        <div> <!-- cadastros -->
                            <div id="0" class="divs"> <!-- cadastra usuario  -->
                                <hr class="mb-5">           
                                <div class="input-group mb-3">
                                    <label class="input-group-text"  for="iNomeUsuario">Nome Completo: </label>
                                    <input class="form-control" id="idNomeUsuario" name="iNomeUsuario" type="text" placeholder="Fulano Silva">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iCpf">CPF (ou RNE): </label>
                                    <input class="form-control" id="idCpf" name="iCpf" type="text" placeholder="00011122233">
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="ilogin">Login: </label>
                                    <input class="form-control" id="idlogin" name="ilogin" type="text" placeholder="FulanoSilva">
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iSenha">Senha: </label>
                                    <input class="form-control" id="idSenha" name="iSenha" type="password" placeholder="senha">
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sTipoUsuario">Tipo de usuário: </label> <!-- select tipousuario -->
                                    <select class="form-select" name="sTipoUsuario" id="idsTipoUsuario">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoUsuario`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['ID']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sSetor">Setor: </label> <!-- select setor -->
                                    <select class="form-select" name="sSetor" id="idsSetor">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Setor`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['ID']?>"><?php echo $r['Nome'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                <label class="input-group-text" for="sTipoFerias">Tipo de férias: </label> <!-- select tipoferias -->
                                    <select class="form-select" name="sTipoFerias" id="idsTipoFerias"> 
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoFerias`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['ID']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sTipoEscala">Tipo de escala: </label> <!-- select tipoescala -->
                                    <select class="form-select" name="sTipoEscala" id="idsTipoEscala">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoEscala`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['ID']?>"><?php echo $r['TipoEscala'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>                     
                                <hr class="mt-5">           
                            </div>

                            <div id="1" class="divs mt-5">
                                <hr class="mb-5">           
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iTipoUsuario">Tipo de usuário: </label> <!-- cadastra tipousuario -->
                                    <input class="form-control" id="idTipoUsuario" name="iTipoUsuario" type="text" placeholder="Diretoria">
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="2" class="divs mt-5">
                                <hr class="mb-5">      
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iSetor">Nome do setor: </label> <!-- cadastra setor -->
                                    <input class="form-control" id="idiSetor" name="iSetor" type="text" placeholder="Administração">
                                </div>     
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iCodigoSetor">Código do setor: </label>
                                    <input class="form-control" id="idiCodigoSetor" name="iCodigoSetor" type="text" placeholder="3214">
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="3" class="divs mt-5">
                                <hr class="mb-5">         
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iPresenca">Tipo da presença: </label> <!-- cadastra presenca -->
                                    <input class="form-control" id="idiPresenca" name="iPresenca" type="text" placeholder="Falta com laudo médico">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iCodigoPresenca">Código da presença: </label>
                                    <input class="form-control" id="idiCodigoPresenca" name="iCodigoPresenca" type="text" placeholder="3">
                                </div>  
                                <hr class="mt-5">
                            </div>
                        </div>     
                        <div class="d-grid d-md-flex justify-content-md-end">
                            <input class="btn btn-secondary mt-3" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra" style="display: none">
                        </div>
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