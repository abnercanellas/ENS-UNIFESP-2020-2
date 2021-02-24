<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "newHeader.php";
    include_once("newHeader.php");
    include_once("connection.php");
?>

<html>
    <head>
        <title>Home - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
        <script>
            function selectCheck(){
                <?php if(isset($_POST['eSetor']) && isset($_POST['eTipoEscala'])){
                    $set = mysqli_real_escape_string($connection, $_POST['eSetor']);
                    $esc = mysqli_real_escape_string($connection, $_POST['eTipoEscala']);                    
                } ?>
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
                        <div id="dEscala">
                            <form class="m-0" action="" method="POST">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="eSetor">Setor: </label> <!-- select setor -->
                                    <select class="form-select" name="eSetor" id="ideSetor">
                                        <option selected>Selecione aqui</option>
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `Setor` ORDER BY Nome");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Nome'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="eTipoEscala">Tipo de escala: </label> <!-- select tipoescala -->
                                    <select class="form-select" name="eTipoEscala" id="ideTipoEscala">
                                        <option selected>Selecione aqui</option>
                                        <?php $s=mysqli_query($connection,"SELECT * FROM `TipoEscala`");
                                            while($r = mysqli_fetch_array($s)){ ?>
                                                <option value="<?php echo $r['Id']?>"><?php echo $r['Tipo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <input class="btn btn-primary mt-3" type="submit"  value="Mostrar Escala" name="formEscala" id="idformEscala" style="display: Block">
                                </div>
                            </form>
                            <ul>
                            <?php require_once('addEscala.php')?>
                            </ul>
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