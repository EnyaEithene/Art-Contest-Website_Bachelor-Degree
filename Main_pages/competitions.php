<?php 
session_start(); 
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title> Competitions </title>
		<link rel="stylesheet" href="../websiteStyle.css">
	</head>

	<body>
		<?php include('../Elem_site/menu.php'); ?>

		<?php include('../Elem_site/logo.php'); ?>

			<div id="page_stack">
				<div id="row">
					<div id="column">
						<div>
							<h1> On-going Competitions </h1>
						</div>

						<?php include("../Competitions/competitions_show.php"); ?>
            
            <h1> Past competitions </h1>

           	<?php include("../Competitions/competitions_show_past.php"); ?>

					</div>
				</div>
			</div>

		<?php include('../Elem_site/footer.php'); ?>
	</body>

	</html>
