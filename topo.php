<?php 
    echo "<header>";
    if (empty($_SERVER['user'])) { //se o user estiver vazio
        echo "<a href='user-login.php'>Entrar</a>";
        
    }else{
        echo "Olá, ".$_SERVER['nome'];
    }
    echo "</header>";

?>