<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P001</title>
    <style>
        table{
            border-collapse: collapse;
        }
        td{
            border: 1px solid black;
            padding: 5px;
        }
        tr:nth-child(even){
            background-color: #ddd;
        }

    </style>
</head>
<body>
    <?php require_once '../includes/banco.php'?>

    <table>
        <?php 
            //fazer query com o select
            $query = $banco->query("select * from jogos");

            //imprimir na tela os registros
            while($reg = $query->fetch_object()){
                //criar linhas dinamicamente
                echo "<tr><td><img src='img/$reg->capa'/><td>$reg->nome"; //o $reg vai percorrer a query e puxar as colunas que se pede "capa" e "nome"
            }

        ?>
    </table>
</body>
</html>