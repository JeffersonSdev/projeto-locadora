<?php 
    require_once "includes/banco.php";
    echo "<footer>";
    echo "<p>Acessado por ".$_SERVER['REMOTE_ADDR']." em ".date('d/m/Y')." </p>";
    echo "<p>Desenvolvido por <a href='#'>Jefferson Araújo</a></p>";
    echo "</footer>";
    $banco->close();
?>