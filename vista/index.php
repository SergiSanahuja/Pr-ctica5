<!--  Sergi sanahuja  -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
		<link rel="stylesheet" href="../estils/estils.css"> <!-- feu referència al vostre fitxer d'estils -->
		<title>Paginació</title>
		
		<script>
			document.getElementById("numArticles").addEventListener("change", function(){
				var numArticles = document.getElementById("numArticles").value;
				window.location.href = "index.php?pagina=1&numArticles=" + numArticles;
			});
			</script>

</head>


<body>
	<?php require_once "../controlador/controlador.php" ?>
	
	<div id="top-nav-bar">
		<div class="tnb-right-section ">
			
			<a href="../vista/registre.vista.php" class="user-anonymous tnb-signup-btn w3-bar-item w3-button w3-right ws-green ws-hover-green ga-top ga-top-signup">
				Sign Up
			</a>
			
			<a href="../vista/login.vista.php" class="user-anonymous tnb-login-btn w3-bar-item w3-btn bar-item-hover w3-right ws-light-green ga-top ga-top-login" >
			Log in
		</a>
		</div>
	</div>
	<div class="contenidor">	
		<h1>Articles</h1>
		<section class="articles"> <!--aqui guardem els articles-->
			<ul name = "llista">
				<?php echo $llista ?>
				
			</ul>
		</section>

		<section class="paginacio">
			<ul>
				<?php if ($paginaActual == 1): ?>
				<li class="disabled"><a href="index.php?pagina=<?php echo $paginaActual - 1 ?>" onclick=<?php comprovarPagina($paginaActual,$numeroPagines) ?>> &laquo;</a></li>
				<?php else: ?>
				<li><a href="index.php?pagina=<?php echo $paginaActual - 1 ?>">&laquo;</a></li>
				<?php endif ?>


				<?php echo $li?>
				<li class="disabled"><a href="index.php?pagina=<?php echo $paginaActual + 1 ?>"  onclick=<?php comprovarPagina($paginaActual,$numeroPagines) ?>>&raquo;</a></li>
			</ul>
		</section>
	</div>

	<?php
	
	
	?>
</body>
</html>