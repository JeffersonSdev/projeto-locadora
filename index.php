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
				$sql = "select j.cod, j.nome, g.genero, j.capa, p.produtora from jogos as j join generos as g on j.genero = g.cod join produtoras as p on j.produtora = p.cod order by nome"; // join para mostrar o nome e não o cod do nome das outras tables
				$busca = $banco->query($sql); // query sql
				if(!$busca){ // caso tenha dado erro na busca
					echo "<tr><td>erro, tente novamente!";
				}else{
					if ($busca->num_rows == 0) { //caso não tenha nenhum registro, o numero de linhas for 0
						echo "<tr><td>Nenhum registro encontrado!";
					}else{ 
						while($reg = $busca->fetch_object()){ //enquanto tiver registros em $busca rodara
							$t = thumb($reg->capa);
							echo "<tr><td><img src='$t' class='mini'/>";
							echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
							echo " [$reg->genero]";
							echo "<br>$reg->produtora";
							echo "<td>Adm";
							//vai criar a linhas da tabela dinamicamente, passando o codigo pela URL
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