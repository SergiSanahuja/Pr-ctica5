<!--  Sergi sanahuja  -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../estils/estils.css"> <!-- feu referència al vostre fitxer d'estils -->
	<title>Paginació</title>
	
	<script>
		document.getElementById("numArticles").addEventListener("change", function(){
			var numArticles = document.getElementById("numArticles").value;
			window.location.href = "index.php?pagina=1&numArticles=" + numArticles;
		});
	</script>

</head>
<?php 
      include_once "../controlador/controlador.php"; 
	  
?>
<body>
	<?php 
		if(isset($_GET['error'])){
			echo "<script>alert('".$_GET['error']."')</script>";
		}		

	?>
			<!-- Redirecció al fitxer per a fer el sesion_destroy i después redirecciona a la vista de usuari anònim   -->
			<a href="../controlador/tencar_sesio.php" ><button type="button" class="user-anonymous tnb-signup-btn w3-bar-item w3-button w3-right ws-green ws-hover-green ga-top ga-top-signup">Exit</button></a>
			
	<div class="contenidor">	
		<h1>Articles</h1>
		<section class="articles"> <!--aqui guardem els articles-->
			<ul name = "llista">
				<?php echo $llista ?>  <!--aqui primta els articles-->				
			</ul>
		</section>

		<section class="paginacio">
			<ul>
				<!-- Canviar el num de la pàgina per fletxa  -->
				<?php if ($paginaActual == 1): ?>
				<li class="disabled"><a href="login.index.vista.php?pagina=<?php echo $paginaActual - 1 ?>" onclick=<?php comprovarPagina($paginaActual,$numeroPagines) ?>> &laquo;</a></li>
				<?php else: ?>
				<li><a href="login.index.vista.php">&laquo;</a></li>
				<?php endif ?>

					<!-- botons paginació -->
				<?php echo $buttonLogin?>
				<li class="disabled"><a href="login.index.vista.php?pagina=<?php echo $paginaActual + 1 ?>"  onclick=<?php comprovarPagina($paginaActual,$numeroPagines) ?>>&raquo;</a></li>
			</ul>
		</section>
		<div>
			<a href="insert.vista.php"><button type="button">INSERTAR</button></a>
			
		</div>
	</div>

	
</body>
</html>