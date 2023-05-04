<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Login de Usuário</title>
	<link rel="stylesheet" href="estilos/style.css">
    <style>
        div#corpo{
            width: 300px;

        }

        div#corpo > h1{
            text-align: center;
        }

        div#corpo  input{
            width: 100%;
        }
    </style>
 </head>
<body> 
	<?php 
		require_once "includes/login.php";
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
        <?php 
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if(is_null($u) || is_null($s)){
                require "user-login-form.php";
            }else{
                echo "Dados foram passados ...";
            }
        ?>
    </div>
</body>
</html>
