<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Listagem de Jogos</title>
	<link rel="stylesheet" href="estilos/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 </head>
<body> 
	<?php 
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
		require_once "includes/login.php";

		$ordem = $_GET['ord'] ?? "nome"; // colocando o valor passado no menu pela url em uma variavel
		$chave = $_GET['busca'] ?? ""; //puxando o parametro busca do form e colocando na variavel $chave
	?>
	<div id="corpo">
		<?php include_once "topo.php" ?>
		<h1>Escolha seu Jogo</h1>
		<form action="index.php" method="get" id="busca">

			Ordenar por: <!--Colocando o valor pela URL -->
			<a href="index.php?ord=nome&busca=<?php echo $chave ?>">Nome</a> | 
			<a href="index.php?ord=prod&busca=<?php echo $chave ?>">Produtora</a> |
			<a href="index.php?ord=manota&busca=<?php echo $chave ?>">Maior Nota</a> |
			<a href="index.php?ord=menota&busca=<?php echo $chave ?>">Menor Nota</a> |
			<a href="index.php">Mostrar Todos</a> |

			<label for="buscar">Buscar: </label>
			<input type="text" name="busca" id="buscar" size="10" maxlength="40"> <!-- parametro busca -->
			<input type="submit" value="Enviar">
	    </form>
		<table class="listagem">
			<?php 
				$sql = "select j.cod, j.nome, g.genero, j.capa, p.produtora from jogos as j join generos as g on j.genero = g.cod join produtoras as p on j.produtora = p.cod "; // join para mostrar o nome e não o cod do nome das outras tables

				if(!empty($chave)){ 
				// se a variavel $chave não estiver vazia vai ser pego a variavel do sql e concatenado com o que foi passado em $chave
					$sql .= "where j.nome like '%$chave%' or p.produtora like '%$chave%' or g.genero like '%$chave%' ";
				}

				switch($ordem){ //de acordo com o valor da URL entrara em um desses
					case "prod":
						$sql .= "order by p.produtora"; //concatedando com o que já existe dentro de $sql
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
							if(is_admin()){
								echo "<td>";
								echo "<span class='material-symbols-outlined'>add_circle</span> ";
								echo "<span class='material-symbols-outlined'>edit</span> ";
								echo "<span class='material-symbols-outlined'>delete</span>";

							}else if(is_editor()){
								echo "<td><span class='material-symbols-outlined'>edit</span>";
							}
							//vai criar as linhas da tabela dinamicamente, passando o codigo pela URL
						}

					}
				}
			?>
		</table>	
	</div> 
	<?php include_once "rodape.php" ?>
</body>

</html>