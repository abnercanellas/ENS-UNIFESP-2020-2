<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "newHeader.php";
   include_once("newHeader.php");
   include('verifyAuthentication.php');
   include('connection.php');
?>

<html>
    <head>
        <title>Conta - Escalas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <header>
            
        </header>
        <div class="container-fluid">
            <div class="row">
                    <div id="menu" class="bg-a1 shadow-sm sidebar-sticky">
                        <?php
                            require_once('menu.php');
                        ?>
                    </div>
                <div id="pag">
                    <div id="conteudo"><!-- conteudo -->
                        <form action="" method="POST">
                            <legend></i>Alterar Senha:</legend>
                                <div class="input-group mb-3" style="width: 600px;">
                                    <label class="input-group-text" for="atualpass">Senha atual: </label>
                                    <input class="form-control" id="atualpassId" name="atualpass" type="password" placeholder="123456">
                                </div>
                                <div class="input-group mb-3" style="width: 600px;">
                                    <label class="input-group-text" for="novaSenha">Nova senha: </label>
                                    <input class="form-control" id="novaSenhaId" name="novaSenha" type="password" placeholder="novaSenha">
                                </div>
                                <div class="input-group mb-3" style="width: 600px;">
                                    <label class="input-group-text" for="repitaSenha">Repita : </label>
                                    <input class="form-control" id="repitaSenhaId" name="repitaSenha" type="password" placeholder="novaSenha">
                                </div>
                                <?php
                                    $query = "SELECT Senha FROM `Usuario` WHERE Login = '{$_SESSION['usuario']}'";
                                    $result = mysqli_query($connection, $query);
                                    $data = mysqli_fetch_assoc($result);
                                    if(isset($_POST['atualpass']) && isset($_POST['repitaSenha']) && isset($_POST['novaSenha'])){
                                        if($_POST['novaSenha']==$_POST['repitaSenha']){
                                            if($data['Senha']!=md5($_POST['atualpass'])){
                                ?>    
                                                <div class="mb-3 text-danger">
                                                    <span >Senha atual não corresponde</span>
                                                </div>
                                <?php
                                            }else{
                                                $query = "UPDATE usuario SET Senha=md5('{$_POST['novaSenha']}') WHERE Login = {$_SESSION['usuario']}";
                                                $result = mysqli_query($connection, $query);
                                                echo 'Senha "'.$_POST['novaSenha'].'" alterada com sucesso!';
                                            }
                                        }else{?>
                                            <div class="mb-3 text-danger">
                                                <span >Senhas novas não correspondem</span>
                                            </div>
                                        <?php }
                                    }
                                ?> 
                                <input  class="btn btn-primary" type="submit" name="verificar" value="Verificar">
                        </form>

                        

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