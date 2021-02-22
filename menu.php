
    <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a class="nav-link <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "home.php") echo 'active';?>" href="home.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "consulta.php") echo 'active';?>" href="consulta.php">CONSULTA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "cadastra.php") echo 'active';?>" href="cadastra.php">CADASTRA</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link <?php $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); if($curPageName == "historico.php") echo 'active';?>" href="historico.php">HISTORICO</a>
        </li> -->
        
    </ul>