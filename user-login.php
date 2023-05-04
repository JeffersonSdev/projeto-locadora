<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Login de Usuário</title>
	<link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                $sql = "SELECT usuario usuario, nome, senha, tipo from usuarios where usuario = '$u' limit 1";
                $busca = $banco->query($sql);
                if(!$busca){
                    echo msg_erro('Falha ao acessar o banco de dados');
                }else{
                    if($busca->num_rows > 0){
                    $reg = $busca->fetch_object();
                    if(testarHash($s,$reg->senha)){
                        echo msg_sucesso('Logado com sucesso');
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['tipo'] = $reg->tipo;

                    }else{
                        echo msg_erro('Senha Inválida');
                    }
                    }else{
                        echo msg_erro('Usuario não existe');
                    }
                }
            }
            echo voltar();
            ?>
    </div>
</body>
</html>
