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
            $busca = $banco->query("select * from jogos as j join generos as g on j.genero = g.cod join produtoras as p on j.produtora = p.cod");
            while($reg= $busca->fetch_object()){
                echo "<tr><td>$reg->capa<td>$reg->nome [$reg->genero]<br>$reg->produtora";
            }
        ?>
    </table>
</body>
</html>