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
                            
                            <div id="tipoConsulta"> <!-- escolhe o tipo de cadastro a realizar -->
                                <select class="form-select my-3" name="sTipoConsulta" id="idsTipoConsulta" onchange="selectCheck()">
                                    <option selected>Selecione aqui</option>
                                    <option value="0">Nome</option>
                                    <option value="1">CPF/COREN</option>
                                    <option value="2">Nível</option>
                                    <option value="3">Setor</option>
                                </select>
                            </div>

                            <div id="0" class="divs">
                                <hr class="mb-5">           
                                <div class="input-group mb-3">
                                    <label class="input-group-text"  for="iNomeUsuario">Nome Completo: </label>
                                    <input class="form-control" id="idNomeUsuario" name="iNomeUsuario" type="text" placeholder="Fulano Silva">
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="1" class="divs">
                                <hr class="mb-5">  
                                <div class="input-group mb-3">       
                                    <label class="input-group-text" for="iCpf">CPF (ou RNE): </label>
                                    <input class="form-control" id="idCpf" name="iCpf" type="text" placeholder="00011122233">
                                </div>  
                                <hr class="mt-5">
                            </div>

                            <div id="2" class="divs">
                                <hr class="mb-5">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sTipoUsuario">Tipo de usuário: </label> <!-- select tipousuario -->
                                    <select class="form-select" name="sTipoUsuario" id="idsTipoUsuario">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoUsuario`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['ID']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>

                            <div id="3" class="divs">
                                <hr class="mb-5">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="sSetor">Setor: </label> <!-- select setor -->
                                    <select class="form-select" name="sSetor" id="idsSetor">
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Setor`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['ID']?>"><?php echo $r['Nome'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <hr class="mt-5">
                            </div>
                            

                        <div class="d-grid d-md-flex justify-content-md-end">
                            <input class="btn btn-secondary mt-3" type="submit"  value="Consultar" name="formConsulta" id="idformConsulta" style="display: none">
                        </div>
                    </form>
                    <?php require_once('attFunc.php')?>
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