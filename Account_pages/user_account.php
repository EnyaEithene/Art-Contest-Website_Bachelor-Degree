<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Account</title>
		<link rel="stylesheet" href="../websiteStyle.css">
	</head>
	<body>
		<!-- elemente comune -->
			<?php include('../Elem_site/menu.php'); ?>
			
			<?php include('../Elem_site/logo.php'); ?>
		
		<div id="row">
			<div id="column">
				<div>
					<h1> Account </h1>
				</div>
				<div>
					Nume:   <?php echo $_SESSION['nume']?>
				</div>
				<div>
					Prenume:  <?php echo $_SESSION['prenume']?>
				</div>
				<div>
					Email: <?php echo $_SESSION['ID']?>
				</div>
				<div>
					Telefon
				</div>
				<div>
					Incarcare arta <br>
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<input type="file" name="fisier" id="fisier">
						<input type="submit" value="Incarca" name="submit">
					</form>
				</div>
				<div>
					<button id="logout" on-click="location.href='logout.php'" type="button"> Logout </button>
				</div>
			</div>
		</div>
	</body>
</html>