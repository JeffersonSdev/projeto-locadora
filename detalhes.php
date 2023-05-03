<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>Titulo da página</title>
	<link rel="stylesheet" href="estilos/style.css">
 </head>
<body> 
	<?php 
		require_once "includes/banco.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
		<?php 
			include_once "topo.php";
			
			$cod = $_GET['cod']??0; //puxando o cod passado na URL
			$query = $banco->query("select * from jogos where cod = '$cod' ");
		?>
		<h1>Detalhes do Jogo</h1>
		<table class="detalhes">
			<?php 
				if(!$query){
					echo "Não encontrado!"; // caso não exista 
				}else{
					if($query->num_rows == 1){
						$reg = $query->fetch_object();
						$t  = thumb($reg->capa);
						echo "<tr>";
						echo	"<td rowspan='3'><img src='$t' class='full' /></td>";
						echo	"<td><h2>$reg->nome</h2>Nota: ".number_format($reg->nota,1)."/10.0</td>";
						echo "</tr>";
						echo "<tr>";
						echo	"<td>$reg->descricao</td>";
						echo "</tr>";
						echo "<tr>";
						echo	"<td>Adm</td>";
						echo "</tr>";
					}
				}
			
			?>
		</table>
		<a href="index.php"><img src="icons/icoback.png" alt="Voltar"></a>
	</div> 
	<?php include_once "rodape.php" ?>
</body>

</html>