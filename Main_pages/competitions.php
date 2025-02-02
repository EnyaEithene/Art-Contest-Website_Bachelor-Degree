<php? session_start(); ?>

	<!DOCTYPE html>
	<html>

	<head>
		<title> Competitions </title>
		<link rel="stylesheet" href="../websiteStyle.css">
	</head>

	<body>
		<div class="page-container">
			<div class="content-wrap">
				<?php include('../Elem_site/menu.php'); ?>

				<?php include('../Elem_site/logo.php'); ?>

				<div id="row">
					<div id="column">
						<div>
							<h1> Competitions </h1>
						</div>

						<?php include("../Competitions/competitions_show.php"); ?>

					</div>
				</div>
			</div>

			<?php include('../Elem_site/footer.php'); ?>
		</div>
	</body>

	</html>