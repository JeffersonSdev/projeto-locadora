<?php  //função caso a imagem não seja encontrada ou não exista
		function thumb($arq){
			$caminho = "img/$arq";
			if(is_null($arq) || !file_exists($caminho)){ // se o arquivo for nulo ou se o caminho do arquivo não esxistir
				return "img/indisponivel.png";

			}else{
				return $caminho;
			}
		}

		function voltar(){
			return "<a href='index.php' class='back'><span class='material-symbols-outlined'>arrow_back</span></a>";
		}

		function msg_sucesso($m){
			$resp = "<div class='sucesso'>$m <span class='material-symbols-outlined'>check_circle</span></div>";
			return $resp;
		}
		function msg_aviso($m){
			$resp = "<div class='aviso'>$m <span class='material-symbols-outlined'>info</span></div>";
			return $resp;
		}
		function msg_erro($m){
			$resp = "<div class='erro'>$m <span class='material-symbols-outlined'>error</span></div>";
			return $resp;
		}
?>