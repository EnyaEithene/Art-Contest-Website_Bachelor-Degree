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
	<title> Leave contest </title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
	<?php include('../Elem_site/menu.php'); ?>

	<?php include('../Elem_site/logo.php'); ?>

	<div class="page_stack">
		<div id="row">
			<div id="column">
				<div>
					<h1> Leave contest </h1>
				</div>

				<!-- Continut pagina -->
                 <?php
                    $ID = $_GET['id'];

                    $query = 'select * from participari 
                                where ';
                 ?>
			</div>
		</div>

	</div>
	
	<?php include("../Elem_site/footer.php"); ?>
</body>

</html>