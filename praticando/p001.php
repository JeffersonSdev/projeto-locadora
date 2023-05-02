<?php 
    //Vamos fazer a conexao com o banco de dados
                    //Host  User    Senha   Banco
    $connect = new mysqli("localhost","root","","bd_games");

    //Criar uma variavel para informar as querys

    $sql = $connect->query("select jogos.nome, genero from jogos ");

    echo "<pre>";

    //criar um laço para mostrar todas as tuplas

    while($print = $sql->fetch_object()){
        print_r($print);

    }



?>