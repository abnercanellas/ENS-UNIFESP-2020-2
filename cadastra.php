<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("newHeader.php");
   include_once("connection.php");
   
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
        <div class="container-fluid">
            <div class="row">
                <div id="menu" class="bg-a1 shadow-sm sidebar-sticky">
                    <?php
                        require_once('menu.php');
                    ?>
                </div>
                <div id="pag">
                    <div id="conteudo"><!-- conteudo -->
                        <div id="dCadastra">
                            <div class="row m-5">
                                <span class="col text-center">
                                    <span class="btn" data-toggle="modal" data-target="#modalUsuario" style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-user-plus"></i></span>
                                     <br>Novo Usuário
                                </span>
                                
                                <span class="col text-center">
                                    <span class="btn" data-toggle="modal" data-target="#modalCategoria"style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-id-card-alt"></i></span>
                                     <br>Nova Categoria
                                </span>
                                <span class="col text-center">
                                    <span class="btn" data-toggle="modal" data-target="#modalCondicao"style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-calendar-times"></i></i></span>
                                     <br>Nova Condição
                                </span>
                                <span class="col text-center">
                                    <span class="btn" data-toggle="modal" data-target="#modalBloco"style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-building"></i></span>
                                     <br>Novo Bloco
                                </span>
                                <span class="col text-center">
                                    <span class="btn" data-toggle="modal" data-target="#modalSetor"style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-sitemap"></i></i></span>
                                     <br>Novo Setor
                                </span>
                            </div>
                            <div class="row m-5">
                                <span class="col text-center">
                                    <span class="btn col" data-toggle="modal" data-target="#modalEscala" style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-calendar-alt"></i></i></span>
                                    <br>Nova Escala
                               </span>
                               <span class="col text-center">
                                    <span class="btn col" data-toggle="modal" data-target="#modalFerias" style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-calendar-minus"></i></i></span>
                                    <br>Novo Férias
                               </span>
                               <span class="col text-center">
                                    <span class="btn col" data-toggle="modal" data-target="#modalPresenca" style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-calendar-check"></i></i></span>
                                    <br>Nova Presença
                               </span>
                               <span class="col text-center">
                                    <span class="btn col" data-toggle="modal" data-target="#modalTipoUsuario" style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-user-cog"></i></i></span>
                                    <br>Novo Tipo
                               </span>
                               <span class="col text-center">
                                    <span class="btn col" data-toggle="modal" data-target="#modalVinculo" style="font-size: 72px; color: Dodgerblue;"><i class="fas fa-link"></i></i></span>
                                    <br>Novo Vinculo
                               </span>
                                
                                
                                
                                
                                
                            </div>

                            <!-- cadastros -->
                            <!-- <div class="modal fade" id="modalUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modal Header</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Some text in the modal.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->

                            <!-- Modal CadastraUsuario  -->       
                            <div class="modal fade" id="modalUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra Usuário</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                            
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
                                                    <input type="hidden" name="sTipoCadastro" value="8">
                                                </div>     
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- cadastra categoria -->
                            <div class="modal fade" id="modalCategoria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra Categoriar</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="iCategoria">Categoria: </label>
                                                    <input class="form-control" id="idiCategoria" name="iCategoria" type="text" placeholder="Enfermeiro(a)">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="iSiglaCat">Sigla: </label>
                                                    <input class="form-control" id="idiSiglaCat" name="iSiglaCat" type="text" placeholder="ENF">
                                                    <input type="hidden" name="sTipoCadastro" value="1">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- cadastra condicao -->
                            <div class="modal fade" id="modalCondicao" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra condição</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="iCondicao">Condição: </label>
                                                    <input class="form-control" id="idiCondicao" name="iCondicao" type="text" placeholder="Ativo">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- cadastra bloco  -->
                            <div class="modal fade" id="modalBloco" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra bloco </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <label class="input-group-text" for="iBloco">Nome do bloco: </label>
                                                <input class="form-control" id="idiBloco" name="iBloco" type="text" placeholder="Clínicas">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                                <input type="hidden" name="sTipoCadastro" value="2">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                
                            <!-- cadastra setor  -->
                            <div class="modal fade" id="modalSetor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra setor </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
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
                                                    <input type="hidden" name="sTipoCadastro" value="3">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>        
                                    
                            <!-- cadastra tipo escala -->
                            <div class="modal fade" id="modalEscala" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra tipo de escala</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
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
                                                    <input type="hidden" name="sTipoCadastro" value="4">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- cadastra tipo ferias -->
                            <div class="modal fade" id="modalFerias" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra tipo de férias</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="iTipoFerias">Tipo de Férias: </label>
                                                    <input class="form-control" id="idiTipoFerias" name="iTipoFerias" type="text" placeholder="Integral">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="iDuracao">Duraçao (dias): </label>
                                                    <input class="form-control" id="idiDuracao" name="iDuracao" type="text" placeholder="30">
                                                    <input type="hidden" name="sTipoCadastro" value="5">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- cadastra tipo de presenca  -->
                            <div class="modal fade" id="modalPresenca" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra tipo de presenca </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="iPresenca">Tipo de presença: </label>
                                                    <input class="form-control" id="idiPresenca" name="iPresenca" type="text" placeholder="Presente">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="iSiglaPres">Sigla: </label>
                                                    <input class="form-control" id="idiSiglaPres" name="iSiglaPres" type="text" placeholder="X">
                                                    <input type="hidden" name="sTipoCadastro" value="6">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- cadastra tipo de usuario  -->
                            <div class="modal fade" id="modalTipoUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra tipo de usuario </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
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
                                                    <input type="hidden" name="sTipoCadastro" value="7">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- cadastra vinculo  -->
                            <div class="modal fade" id="modalVinculo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="addFunc.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Cadastra vinculo </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="iVinculo">Vínculo: </label>
                                                    <input class="form-control" id="idiVinculo" name="iVinculo" type="text" placeholder="SPDM">
                                                    <input type="hidden" name="sTipoCadastro" value="9">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit"  value="Cadastrar" name="formCadastra" id="idformCadastra">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "footer.php";
   include_once("footer.php");
?>