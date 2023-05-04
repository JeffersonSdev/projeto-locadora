<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Edição de Dados</title>
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
        if (!is_logado()) {
            echo msg_erro("Você precisa fazer <a href='user-login.php'><strong>login</strong></a> está logado");
        } else {
            if (!isset($_POST['usuario'])) {
                include "user-edit-form.php";
            } else {
                echo msg_sucesso("Dados recebidos");
            }
        }

        echo voltar();


        ?>
    </div>
</body>

</html>