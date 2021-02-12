<?php
session_start();
include('connection.php');

$TipoCadastro = mysqli_real_escape_string($connection, $_POST['sTipoCadastro']);

function alert($msg, $page) {
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='$page';
        </script>");
}

switch ($TipoCadastro) {
    case '0': //Bloco
        $NomeBloco = mysqli_real_escape_string($connection, $_POST['iBloco']);

        $query = "SELECT * FROM `Bloco` WHERE Nome = '{$NomeBloco}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Um bloco com o nome "'.$NomeBloco.'" já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `Bloco` (`Nome`) VALUES ('{$NomeBloco}')";
            $result = mysqli_query($connection, $query);
            alert('Bloco "'.$NomeBloco.'" cadastrado com sucesso!', 'cadastra.php');
        }
    break;
    
    case '1': //Categoria
        $Categoria = mysqli_real_escape_string($connection, $_POST['iCategoria']);
        $SiglaCat = mysqli_real_escape_string($connection, $_POST['iSiglaCat']);

        $query = "SELECT * FROM `Categoria` WHERE Cat = '{$Categoria}' OR Sigla = '{$$SiglaCat}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Esta categoria já está cadastrada.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `Categoria` (`Cat`, `Sigla`) VALUES ('{$Categoria}', '{$SiglaCat}')";
            $result = mysqli_query($connection, $query);
            alert('Categoria "'.$SiglaCat.' - '.$Categoria.'" cadastrada com sucesso!', 'cadastra.php');
        }
    break;

    case '2': //Condicao
        $Condicao = mysqli_real_escape_string($connection, $_POST['iCondicao']);

        $query = "SELECT * FROM `Condicao` WHERE Cond = '{$Condicao}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Uma condição com o nome "'.$Condicao.'" já está cadastrada.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `Condicao` (`Cond`) VALUES ('{$Condicao}')";
            $result = mysqli_query($connection, $query);
            alert('Condição "'.$Condicao.'" cadastrada com sucesso!', 'cadastra.php');
        }
    break;

    case '3': //Setor
        $NomeSetor = mysqli_real_escape_string($connection, $_POST['iSetor']);
        $BlocoId = mysqli_real_escape_string($connection, $_POST['sBloco']);

        $query = "SELECT * FROM `Setor` WHERE Nome = '{$NomeSetor}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        $query = "SELECT Nome FROM `Bloco` WHERE Id = '{$BlocoId}'";
        $data = mysqli_fetch_assoc(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Um setor com o nome "'.$NomeSetor.'" já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `Setor` (`Nome`, `BlocoId`) VALUES ('{$NomeSetor}', '{$BlocoId}')";
            $result = mysqli_query($connection, $query);
            alert('Setor "'.$NomeSetor.'" cadastrado no bloco "'.$data['Nome'].'" com sucesso!', 'cadastra.php');
        }
    break;

    case '4': //TipoEscala
        $TipoEscala = mysqli_real_escape_string($connection, $_POST['iTipoEscala']);
        $Dias = mysqli_real_escape_string($connection, $_POST['iDias']);
        $Horas = mysqli_real_escape_string($connection, $_POST['iHoras']);
        
        $query = "SELECT * FROM `TipoEscala` WHERE Tipo = '{$TipoEscala}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Um tipo de escala com o nome "'.$TipoEscala.'" já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `TipoEscala` (`Tipo`, `Dias`, `Horas`) VALUES ('{$TipoEscala}', '{$Dias}', '{$Horas}')";
            $result = mysqli_query($connection, $query);
            alert('Tipo de escala "'.$TipoEscala.'" cadastrado com sucesso!', 'cadastra.php');
        }
    break;

    case '5': //TipoFerias
        $TipoFerias = mysqli_real_escape_string($connection, $_POST['iTipoFerias']);
        $Duracao = mysqli_real_escape_string($connection, $_POST['iDuracao']);
        
        $query = "SELECT * FROM `TipoFerias` WHERE Nome = '{$TipoFerias}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Um tipo de férias com o nome "'.$TipoFerias.'" já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `TipoFerias` (`Tipo`, `Duracao`) VALUES ('{$TipoFerias}', '{$Duracao}')";
            $result = mysqli_query($connection, $query);
            alert('Tipo de férias "'.$TipoFerias.'" cadastrado com sucesso!', 'cadastra.php');
        }
    break;

    case '6': //TipoPresenca
        $TipoPresenca = mysqli_real_escape_string($connection, $_POST['iPresenca']);
        $SiglaPres = mysqli_real_escape_string($connection, $_POST['iSiglaPres']);
        
        $query = "SELECT * FROM `TipoPresenca` WHERE Tipo = '{$TipoPresenca}' OR Sigla = '{$SiglaPres}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Este tipo de presença já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `TipoPresenca` (`Tipo`, `Sigla`) VALUES ('{$TipoPresenca}', '{$SiglaPres}')";
            $result = mysqli_query($connection, $query);
            alert('Tipo de presença "'.$SiglaPres.' - '.$TipoPresenca.'" cadastrado com sucesso!', 'cadastra.php');
        }
    break;
    
    case '7': //TipoUsuario
        $TipoUsuario = mysqli_real_escape_string($connection, $_POST['iTipoUsuario']);
        $AcessoId = mysqli_real_escape_string($connection, $_POST['sAcesso']);
        
        $query = "SELECT * FROM `TipoUsuario` WHERE Tipo = '{$TipoUsuario}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        $query = "SELECT Tipo FROM `Acesso` WHERE Id = '{$AcessoId}'";
        $data = mysqli_fetch_assoc(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Um tipo de usuário com o nome "'.$TipoUsuario.'" já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `TipoUsuario` (`Tipo`, `Acesso`) VALUES ('{$TipoUsuario}', '{$AcessoId}')";
            $result = mysqli_query($connection, $query);
            alert('Tipo de usuário "'.$TipoUsuario.'" com acesso para "'.$data['Tipo'].'" cadastrado com sucesso!', 'cadastra.php');
        }
    break;
    
    case '8': //Usuario
        $Cpf = mysqli_real_escape_string($connection, $_POST['iCpf']);
        $RfRe = mysqli_real_escape_string($connection, $_POST['iRfRe']);
        $Coren = mysqli_real_escape_string($connection, $_POST['iCoren']);
        $Nome = mysqli_real_escape_string($connection, $_POST['iNomeUsuario']);
        $Login = mysqli_real_escape_string($connection, $_POST['iCpf']);
        $Senha = '123456';
        $VinculoId = mysqli_real_escape_string($connection, $_POST['sVinculo']);
        $CategoriaId = mysqli_real_escape_string($connection, $_POST['sCategoria']);
        $TipoUsuarioId = mysqli_real_escape_string($connection, $_POST['sTipoUsuario']);
        $CondicaoId = mysqli_real_escape_string($connection, $_POST['sCondicao']);
        $SetorId = mysqli_real_escape_string($connection, $_POST['sSetor']);
        $TipoEscalaId = mysqli_real_escape_string($connection, $_POST['sTipoEscala']);
        $TipoFeriasId = mysqli_real_escape_string($connection, $_POST['sTipoFerias']);     

        $query = "SELECT * FROM `Usuario` WHERE Cpf = '{$Cpf}'";
        $row_cpf = mysqli_num_rows(mysqli_query($connection, $query));
        $query = "SELECT * FROM `Usuario` WHERE RfRe = '{$RfRe}'";
        $row_rfre = mysqli_num_rows(mysqli_query($connection, $query));
        $query = "SELECT * FROM `Usuario` WHERE Coren = '{$Coren}'";
        $row_coren = mysqli_num_rows(mysqli_query($connection, $query));

        // alertas de dados repetidos
        if($row_cpf > 0 && $row_rfre > 0 && $row_coren > 0){
            alert('Os seguintes dados já encontram-se cadastrados:\nCPF: '.$Cpf.'\nRF/RE: '.$RfRe.'\nCOREN: '.$Coren, 'cadastra.php');
        } elseif ($row_cpf > 0 && $row_rfre > 0) {
            alert('Os seguintes dados já encontram-se cadastrados:\nCPF: '.$Cpf.'\nRF/RE: '.$RfRe, 'cadastra.php');
        } elseif ($row_cpf > 0 && $row_coren > 0) {
            alert('Os seguintes dados já encontram-se cadastrados:\nCPF: '.$Cpf.'\nCOREN: '.$Coren, 'cadastra.php');
        } elseif ($row_rfre > 0 && $row_coren > 0) {
            alert('Os seguintes dados já encontram-se cadastrados:\nRF/RE: '.$RfRe.'\nCOREN: '.$Coren, 'cadastra.php');
        } elseif ($row_cpf > 0) {
            alert('O CPF: '.$Cpf.' já encontra-se cadastrado.', 'cadastra.php');
        } elseif ($row_rfre > 0) {
            alert('O RF/RE: '.$RfRe.' já encontra-se cadastrado.', 'cadastra.php');
        } elseif ($row_coren > 0) {
            alert('O COREN: '.$Coren.' já encontra-se cadastrado.', 'cadastra.php');
        }
        // inserindo dados na tabela Usuario
        else{
            $query = "INSERT INTO `Usuario` (`Cpf`, `RfRe`, `Coren`, `Nome`, `Login`, `Senha`, `VinculoId`, `CategoriaId`, `TipoUsuarioId`, `CondicaoId`, `SetorId`, `TipoEscalaId`, `TipoFeriasId`) VALUES ('{$Cpf}', '{$RfRe}', '{$Coren}', '{$Nome}', '{$Login}', md5('{$Senha}'), '{$VinculoId}', '{$CategoriaId}', '{$TipoUsuarioId}', '{$CondicaoId}', '{$SetorId}', '{$TipoEscalaId}', '{$TipoFeriasId}')";  
            $result = mysqli_query($connection, $query);
            alert('O usuário '.$Nome.' foi cadastrado com sucesso!.\nLogin: '.$Login.'\nSenha:'.$Senha.'\nA senha é gerada automaticamente e deve ser alterada pelo usuário.', 'cadastra.php');
        }
    break;

    case '9': //Vinculo
        $Vinculo = mysqli_real_escape_string($connection, $_POST['iVinculo']);
                
        $query = "SELECT * FROM `Vinculo` WHERE Vinc = '{$Vinculo}'";
        $row = mysqli_num_rows(mysqli_query($connection, $query));
        
        if($row > 0) {
            alert('Um vínculo com o nome "'.$Vinculo.'" já está cadastrado.', 'cadastra.php');
        } else {
            $query = "INSERT INTO `Vinculo` (`Vinc`) VALUES ('{$Vinculo}')";
            $result = mysqli_query($connection, $query);
            alert('Vínculo "'.$Vinculo.'" cadastrado com sucesso!', 'cadastra.php');
        }
    break;

    default:
        
        break;
}