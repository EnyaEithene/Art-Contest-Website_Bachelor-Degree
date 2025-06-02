<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>

<head>
	<title> titlu pagina </title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
	<?php include('../Elem_site/menu.php'); ?>

	<?php include('../Elem_site/logo.php'); ?>

	<div class="page_stack">
		<div id="row">
			<div id="column">
				<div>
					<h1> Titlu pagina </h1>
				</div>

				<!-- Continut pagina -->

			</div>
		</div>

	</div>
	
	<?php include("../Elem_site/footer.php"); ?>
</body>

</html>