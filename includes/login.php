<?php 
session_start();
if(!isset($_SERVER['user'])){ // se o user não for configurado
    $_SESSION['user'] = "Jefferson";
    $_SESSION['nome'] = "Jefferson Araujo";
    $_SESSION['tipo'] = "";
}


    function cripto($senha){
        $c = '';
        for($pos = 0; $pos < strlen($senha); $pos++){
            $letra = ord($senha[$pos]) + 1;
            $c .= chr($letra);
        }
        return $c;
    }
    
    function gerarHash($senha){
        $txt = cripto($senha);
        $hash = password_hash($txt, PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash($senha, $hash){
        $ok = password_verify($senha, $hash);
        return $ok;
    }



?>