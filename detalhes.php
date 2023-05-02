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
			$cod = $_GET['cod']??0;
			$query = $banco->query("select * from jogos where cod = '$cod' ");
		?>
		<h1>Detalhes do Jogo</h1>
		<table class="detalhes">
			<?php 
				if(!$query){
					echo "Não encontrado!";
				}else{
					if($query->num_rows == 1){
						$reg = $query->fetch_object();
						echo "<tr>";
						echo	"<td rowspan='3'><img src=''</td>";
						echo	"<td><h2>$reg->nome</h2></td>";
						echo "</tr>";
						echo "<tr>";
						echo	"<td>Descrição</td>";
						echo "</tr>";
						echo "<tr>";
						echo	"<td>Adm</td>";
						echo "</tr>";
					}
				}
			
			?>
		</table>
	</div> 
</body>

</html>