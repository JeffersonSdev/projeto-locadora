<?php 
session_start();
if(!isset($_SESSION['user'])){ // se o user não for configurado
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
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

    function logout(){ //deletando variaveis
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
    }

    function is_logado(){
        if(!empty($_SESSION['user'])){ //se nao estiver vazio
            return true;
        }else{
            return false;
        }
    }

    function is_admin(){
        $t = $_SESSION['tipo'] ??0;
        if(is_null($t)){
            return false;
        }else{
            if($t == 'admin'){
                return true;
            }else{
                return false;
            }
        }
    }

    function is_editor(){
        $t = $_SESSION['tipo']??0;
        if(is_null($t)){
            return false;
        }else{
            if($t == 'editor'){
                return true;
            }else{
                return false;
            }
        }
    }

?>