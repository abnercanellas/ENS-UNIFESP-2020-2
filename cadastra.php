<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("header.php");
   include_once("connection.php");
   include('verifyAuthentication.php');
   
   $required_level = 1; //diretoria
   $query = "SELECT Acesso FROM `TipoUsuario` WHERE Id = '{$_SESSION['tipoUserId']}'";
   $data = mysqli_fetch_assoc(mysqli_query($connection, $query));

   if($data['Acesso'] != $required_level) {
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
                                <option value="0">Bloco</option>
                                <option value="1">Categoria</option>
                                <option value="2">Condição</option>
                                <option value="3">Setor</option>
                                <option value="4">Tipo de Escala</option>
                                <option value="5">Tipo de Férias</option>
                                <option value="6">Tipo de Presença</option>
                                <option value="7">Tipo de Usuário</option>
                                <option value="8">Usuário</option>
                                <option value="9">Vínculo</option>
                            </select>
                        </div>

                        <div> <!-- cadastros -->
                            <div id="0" class="divs mt-5"> <!-- cadastra bloco  -->
                                <hr class="mb-5">      
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iBloco">Nome do bloco: </label>
                                    <input class="form-control" id="idiBloco" name="iBloco" type="text" placeholder="Clínicas">
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="1" class="divs mt-5"> <!-- cadastra categoria -->
                                <hr class="mb-5">      
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iCategoria">Categoria: </label>
                                    <input class="form-control" id="idiCategoria" name="iCategoria" type="text" placeholder="Enfermeiro(a)">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iSiglaCat">Sigla: </label>
                                    <input class="form-control" id="idiSiglaCat" name="iSiglaCat" type="text" placeholder="ENF">
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="2" class="divs mt-5"> <!-- cadastra condicao -->
                                <hr class="mb-5">      
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iCondicao">Condição: </label>
                                    <input class="form-control" id="idiCondicao" name="iCondicao" type="text" placeholder="Ativo">
                                </div>
                                <hr class="mt-5">
                            </div>
                            
                            <div id="3" class="divs mt-5"> <!-- cadastra setor  -->
                                <hr class="mb-5">      
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iSetor">Nome do setor: </label>
                                    <input class="form-control" id="idiSetor" name="iSetor" type="text" placeholder="Clínica Médica">
                                </div>     
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sBloco">Bloco: </label> <!-- select bloco -->
                                    <select class="form-select" name="sBloco" id="idsBloco">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Bloco` ORDER BY Nome");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Nome'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="4" class="divs mt-5"> <!-- cadastra tipo escala -->
                                <hr class="mb-5">      
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iTipoEscala">Tipo de Escala: </label>
                                    <input class="form-control" id="idiCindicao" name="iCindicao" type="text" placeholder="6x1 8h">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iDias">Dias seguidos de trabalho: </label>
                                    <input class="form-control" id="idiDias" name="iDias" type="text" placeholder="6">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iHoras">Horas/dia: </label>
                                    <input class="form-control" id="idiHoras" name="iHoras" type="text" placeholder="8">
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="5" class="divs mt-5"> <!-- cadastra tipo ferias -->
                                <hr class="mb-5">      
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iTipoFerias">Tipo de Férias: </label>
                                    <input class="form-control" id="idiTipoFerias" name="iTipoFerias" type="text" placeholder="Integral">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iDuracao">Duraçao (dias): </label>
                                    <input class="form-control" id="idiDuracao" name="iDuracao" type="text" placeholder="30">
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="6" class="divs mt-5"> <!-- cadastra tipo de presenca  -->
                                <hr class="mb-5">         
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iPresenca">Tipo de presença: </label>
                                    <input class="form-control" id="idiPresenca" name="iPresenca" type="text" placeholder="Presente">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iSiglaPres">Sigla: </label>
                                    <input class="form-control" id="idiSiglaPres" name="iSiglaPres" type="text" placeholder="X">
                                </div>  
                                <hr class="mt-5">
                            </div>

                            <div id="7" class="divs mt-5"> <!-- cadastra tipo de usuario  -->
                                <hr class="mb-5">           
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iTipoUsuario">Tipo de usuário: </label> <!-- cadastra tipousuario -->
                                    <input class="form-control" id="idiTipoUsuario" name="iTipoUsuario" type="text" placeholder="Diretoria">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sAcesso">Acesso: </label> <!-- select acesso -->
                                    <select class="form-select" name="sAcesso" id="idsAcesso">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Acesso` ORDER BY Id");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="8" class="divs"> <!-- cadastra usuario  -->
                                <hr class="mb-5">           
                                <div class="input-group mb-3">
                                    <label class="input-group-text"  for="iNomeUsuario">Nome Completo: </label>
                                    <input class="form-control" id="idiNomeUsuario" name="iNomeUsuario" type="text" placeholder="Nome Sobrenome">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iCpf">CPF (ou CRNM): </label>
                                    <input class="form-control" id="idiCpf" name="iCpf" type="text" placeholder="00011122233">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iRfRe">RF/RE: </label>
                                    <input class="form-control" id="idiRfRe" name="iRfRe" type="text" placeholder="1234567">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iCoren">COREN: </label>
                                    <input class="form-control" id="idiCoren" name="iCoren" type="text" placeholder="123456">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sVinculo">Vínculo: </label> <!-- select vinculo -->
                                    <select class="form-select" name="sVinculo" id="idsVinculo">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Vinculo` ORDER BY Vinc");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Vinc'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sCategoria">Categoria: </label> <!-- select categoria -->
                                    <select class="form-select" name="sCategoria" id="idsCategoria">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Categoria` ORDER BY Cat");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Cat'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sTipoUsuario">Tipo de usuário: </label> <!-- select tipousuario -->
                                    <select class="form-select" name="sTipoUsuario" id="idsTipoUsuario">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoUsuario` ORDER BY Tipo");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sCondicao">Condição: </label> <!-- select condicao -->
                                    <select class="form-select" name="sCondicao" id="idsCondicao">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Condicao` ORDER BY Cond");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Cond'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sSetor">Setor: </label> <!-- select setor -->
                                    <select class="form-select" name="sSetor" id="idsSetor">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Setor` ORDER BY Nome");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Nome'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sTipoEscala">Tipo de escala: </label> <!-- select tipoescala -->
                                    <select class="form-select" name="sTipoEscala" id="idsTipoEscala">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoEscala`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                <label class="input-group-text" for="sTipoFerias">Tipo de férias: </label> <!-- select tipoferias -->
                                    <select class="form-select" name="sTipoFerias" id="idsTipoFerias"> 
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoFerias`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Nome'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>              
                                <hr class="mt-5">           
                            </div>

                            <div id="9" class="divs mt-5"> <!-- cadastra vinculo  -->
                                <hr class="mb-5">      
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="iVinculo">Vínculo: </label>
                                    <input class="form-control" id="idiVinculo" name="iVinculo" type="text" placeholder="SPDM">
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