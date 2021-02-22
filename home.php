<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "newHeader.php";
    include_once("newHeader.php");
    include_once("connection.php");
    
    function initialDate(){
        date_default_timezone_set('America/Sao_Paulo');
        $d = date("d", time());
        $day = date("Y-m-d", time());
        if($d <= 15) {
            $day=strftime("%Y-%m-%d", strtotime("$day -1 month"));
        }
        $day=strftime("%Y-%m-%d", strtotime("$day -$d day"));
        $day=strftime("%Y-%m-%d", strtotime("$day +16 day"));
        return $day;
    }
    
    function finalDate(){
        date_default_timezone_set('America/Sao_Paulo');
        $d = date("d", time());
        $day = date("Y-m-d", time());
        if($d >= 16) {
            $day=strftime("%Y-%m-%d", strtotime("$day +1 month"));
        }
        $day=strftime("%Y-%m-%d", strtotime("$day -$d day"));
        $day=strftime("%Y-%m-%d", strtotime("$day +15 day"));
        return $day;
    }

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

                            <div id="idTabela">
                                <table style="width:100%">
                                    <tr>
                                        <th>RF/RE</th>
                                        <th>Nome</th>
                                        <th>Cat.</th>
                                        <th>COREN</th>
                                        <th>Entrada</th>
                                        <th>Saída</th>
                                        <?php
                                            $dayinit = initialDate();
                                            $dayend = finalDate();
                                            $dayend = strftime("%Y-%m-%d", strtotime("$dayend +1 day"));
                                            while($dayinit != $dayend){
                                                $d = DateTime::createFromFormat("Y-m-d", $dayinit);?>
                                                <th><?php echo $d->format("d") ?></th>
                                                <?php
                                                $dayinit=strftime("%Y-%m-%d", strtotime("$dayinit +1 day"));
                                            }
                                        ?>
                                    </tr>
                                    
                                    <?php
                                    $dayinit = initialDate();
                                    $query_escala = "SELECT Id FROM `Escalas` WHERE `DataInicio` LIKE '{$dayinit}'";
                                    if(mysqli_num_rows(mysqli_query($connection, $query_escala)) > 0){
                                        $idescala = mysqli_fetch_array(mysqli_query($connection, $query_escala))['Id'];
                                    
                                        $query_user = "SELECT * FROM `Usuario` WHERE `SetorId` LIKE '{$set}' AND `TipoEscalaId` LIKE '{$esc}'";
                                        if(mysqli_num_rows(mysqli_query($connection, $query_user)) > 0){
                                            while($user = mysqli_fetch_array(mysqli_query($connection, $query_user))){
                                                $rfre = $user['RfRe'];
                                                $nome = $user['Nome'];
                                                $cat = mysqli_fetch_array(mysqli_query($connection,"SELECT Cat FROM `Categoria` WHERE `Id` = {$user['CategoriaId']}"))['Cat'];
                                                $coren = $user['Coren'];
                                                $entrada = mysqli_fetch_array(mysqli_query($connection,"SELECT HoraInicio FROM `Celula` WHERE `UsuarioId` = {$user['Cpf']} AND `EscalasId` = {$idescala}"));
                                                $saida = mysqli_fetch_array(mysqli_query($connection,"SELECT HoraFim    FROM `Celula` WHERE `UsuarioId` = {$user['Cpf']} AND `EscalasId` = {$idescala}"));
                                                
                                            }
                                        }else{
                                            echo "Nenhum funcionário na escala selecionanda.\n";
                                        }
                                    }
                                    ?>
                                    
                                    <tr>
                                        <td>123</td>
                                        <td>Jackson</td>
                                        <td>Enf</td>
                                        <td>1234567</td>
                                        <td>12:30</td>
                                        <td>18:30</td>
                                        <?php
                                            for($i=0; $i<28;$i++){
                                                echo "<td> -- </td>";
                                            }
                                        ?>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                    <span class="clear"></span>
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