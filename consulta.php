<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "header.php";
   include_once("header.php");
   include_once("connection.php");
   include('verifyAuthentication.php')
?>

<html>
    <head>
        <title>Consulta - Escalas</title>
	<link rel="stylesheet" href="styles/stylesConsu.css">
        <script>
            function selectCheck(){
                var x = document.getElementById("idsTipoConsulta").value;
                if (x >= 0) {
                    document.getElementById("idformConsulta").style.display = "Block";    
                } else {
                    document.getElementById("idformConsulta").style.display = "none";
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
                <div id="dConsulta">
                    <form class="m-0" action="" method="POST">
                            <legend>Consulta: </legend>
                            
                            <div id="tipoConsulta"> <!-- escolhe o tipo de consulta a realizar -->
                                <select class="form-select my-3" name="sTipoConsulta" id="idsTipoConsulta" onchange="selectCheck()">
                                    <option selected>Selecione aqui</option>
                                    <option value="0">Nome</option>
                                    <option value="1">CPF</option>
                                    <option value="2">RF/RE</option>
                                    <option value="3">COREN</option>
                                    <option value="4">Vínculo</option>
                                    <option value="5">Categoria</option>
                                    <option value="6">Tipo de Usuário</option>
                                    <option value="7">Condição</option>
                                    <option value="8">Nível de Acesso</option>
                                    <option value="9">Bloco</option>
                                    <option value="10">Setor</option>
                                    <option value="11">Tipo de Escala</option>
                                </select>
                            </div>

                            <div id="0" class="divs">
                                <hr class="mb-5">           
                                <div class="input-group mb-3">
                                    <label class="input-group-text"  for="iNomeUsuario">Nome Completo: </label>
                                    <input class="form-control" id="idiNomeUsuario" name="iNomeUsuario" type="text" placeholder="Nome Sobrenome">
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="1" class="divs">
                                <hr class="mb-5">  
                                <div class="input-group mb-3">       
                                    <label class="input-group-text" for="iCpf">CPF (ou CRNM): </label>
                                    <input class="form-control" id="idiCpf" name="iCpf" type="text" placeholder="00011122233">
                                </div>  
                                <hr class="mt-5">
                            </div>

                            <div id="2" class="divs">
                                <hr class="mb-5">  
                                <div class="input-group mb-3">       
                                    <label class="input-group-text" for="iRfRe">RF/RE: </label>
                                    <input class="form-control" id="idiRfRe" name="iRfRe" type="text" placeholder="1234567">
                                </div>  
                                <hr class="mt-5">
                            </div>

                            <div id="3" class="divs">
                                <hr class="mb-5">  
                                <div class="input-group mb-3">       
                                    <label class="input-group-text" for="iCoren">COREN: </label>
                                    <input class="form-control" id="idiCoren" name="iCoren" type="text" placeholder="123456">
                                </div>  
                                <hr class="mt-5">
                            </div>

                            <div id="4" class="divs">
                                <hr class="mb-5">  
                                <div class="input-group mb-3">       
                                    <label class="input-group-text" for="sVinculo">Vínculo: </label>
                                    <select class="form-select" name="sVinculo" id="idsVinculo">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Vinculo` ORDER BY Vinc");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Vinc'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>  
                                <hr class="mt-5">
                            </div>

                            <div id="5" class="divs">
                                <hr class="mb-5">  
                                <div class="input-group mb-3">       
                                    <label class="input-group-text" for="sCategoria">Categoria: </label>
                                    <select class="form-select" name="sCategoria" id="idsCategoria">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Categoria` ORDER BY Cat");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Cat'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>  
                                <hr class="mt-5">
                            </div>

                            <div id="6" class="divs">
                                <hr class="mb-5">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sTipoUsuario">Tipo de usuário: </label>
                                    <select class="form-select" name="sTipoUsuario" id="idsTipoUsuario">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoUsuario` ORDER BY Tipo");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="7" class="divs">
                                <hr class="mb-5">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sCondicao">Condição: </label>
                                    <select class="form-select" name="sCondicao" id="idsCondicao">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Condicao` ORDER BY Cond");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Cond'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="8" class="divs">
                                <hr class="mb-5">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sAcesso">Nível de Acesso: </label>
                                    <select class="form-select" name="sAcesso" id="idsAcesso">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Acesso` ORDER BY Tipo");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="9" class="divs">
                                <hr class="mb-5">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sBloco">Bloco: </label>
                                    <select class="form-select" name="sBloco" id="idsBloco">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Bloco` ORDER BY Nome");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Nome'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="10" class="divs">
                                <hr class="mb-5">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sSetor">Setor: </label>
                                    <select class="form-select" name="sSetor" id="idsSetor">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Setor` ORDER BY Nome");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Nome'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="11" class="divs">
                                <hr class="mb-5">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sTipoEscala">Tipo de Escala: </label>
                                    <select class="form-select" name="sTipoEscala" id="idsTipoEscala">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoEscala`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>
                            

                        <div class="d-grid d-md-flex justify-content-md-end">
                            <input class="btn btn-secondary mt-3" type="submit"  value="Consultar" name="formConsulta" id="idformConsulta" style="display: none">
                        </div>
                    </form>
		<ul>
		<?php require_once('attFunc.php')?>
		</ul>
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