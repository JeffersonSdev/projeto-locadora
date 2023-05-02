<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Listagem de Jogos</title>
	<link rel="stylesheet" href="estilos/style.css">
 </head>
<body> 
	<?php 
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
		<h1>Escolha seu Jogo</h1>
		<table class="listagem">
			<?php 
				$busca = $banco->query("select capa,nome from jogos order by nome "); // query sql

				if(!$busca){ // caso tenha dado erro na busca
					echo "<tr><td>erro, tente novamente!";
				}else{
					if ($busca->num_rows == 0) { //caso não tenha nenhum registro, o numero de linhas for 0
						echo "<tr><td>Nenhum registro encontrado!";
					}else{ 
						while($reg = $busca->fetch_object()){ //enquanto tiver registros em $busca rodara
							$t = thumb($reg->capa);
							echo "<tr><td><img src='$t' class='mini'/> <td>$reg->nome<td>Adm"; //vai criar a linhas da tabela dinamicamente
						}

					}
				}
			?>
			<!--<tr>
				<td>Foto</td><td>Nome</td><td>Adm</td>
			</tr>
			<tr>
				<td>Foto</td><td>Nome</td><td>Adm</td>
			</tr>
			<tr>
				<td>Foto</td><td>Nome</td><td>Adm</td>
			</tr>
			<tr>
				<td>Foto</td><td>Nome</td><td>Adm</td>
			</tr>
			-->
		</table>
	</div> 
	<?php $banco->close() ?>
</body>

</html>