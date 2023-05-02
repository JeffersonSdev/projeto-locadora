<?php  //função caso a imagem não seja encontrada ou não exista
		function thumb($arq){
			$caminho = "img/$arq";
			if(is_null($arq) || !file_exists($caminho)){ // se o arquivo for nulo ou se o caminho do arquivo não esxistir
				return "img/indisponivel.png";

			}else{
				return $caminho;
			}
		}
?>