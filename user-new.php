<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Cadastrar Novo Usuário</title>
	<link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 </head>
<body> 
	<?php 
		require_once "includes/login.php";
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
        <?php 
            if(!is_admin()){
                echo msg_erro("Você não é administrador");
            }else{
                if (!isset($_POST['usuario'])) {
                    require "user-new-form.php";
                }else{
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    
                    if($senha1 === $senha2){
                        echo msg_sucesso("Novo Usuario Cadastrado com Sucesso");
                    }else{
                        echo msg_aviso("Senhas diferentes, tente novamente");
                    }
                }

            }
            echo voltar();
        ?>
    </div>
</body>
</html>