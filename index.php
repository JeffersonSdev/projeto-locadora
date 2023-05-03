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

		$ordem = $_GET['ord'] ?? "nome";
	?>
	<div id="corpo">
		<?php include_once "topo.php" ?>
		<h1>Escolha seu Jogo</h1>
		<form action="index.php" method="get" id="busca">

			Ordenar por: 
			<a href="index.php?ord=nome">Nome</a> | 
			<a href="index.php?ord=prod">Produtora</a> |
			<a href="index.php?ord=manota">Maior Nota</a> |
			<a href="index.php?ord=menota">Menor Nota</a> |

			<label for="buscar">Buscar: </label>
			<input type="text" name="busca" id="buscar" size="10" maxlength="40">
			<input type="submit" value="Enviar">
	    </form>
		<table class="listagem">
			<?php 
				$sql = "select j.cod, j.nome, g.genero, j.capa, p.produtora from jogos as j join generos as g on j.genero = g.cod join produtoras as p on j.produtora = p.cod "; // join para mostrar o nome e não o cod do nome das outras tables

				switch($ordem){
					case "prod":
						$sql .= "order by p.produtora";
						break;
					case "manota":
						$sql .= "order by j.nota DESC";
						break;
					case "menota":
						$sql .= "order by j.nota ASC";
						break;
					default:
						$sql .= "order by j.nome";
						break;
				}

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
							echo " [$reg->genero]"; // puxando o genero do join
							echo "<br>$reg->produtora"; // puxando a produtora do join
							echo "<td>Adm";
							//vai criar a linhas da tabela dinamicamente, passando o codigo pela URL
						}

					}
				}
			?>
		</table>	
	</div> 
	<?php include_once "rodape.php" ?>
</body>

</html>