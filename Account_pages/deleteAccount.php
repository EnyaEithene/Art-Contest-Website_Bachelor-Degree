<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title> Account deletion </title>
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
						<h1> Account deletion </h1>
					</div>

					Are you sure you want to delete your account? <br><br>
                    <button id="logout" class="small" onclick="location.href='delete.php'" type="button"> Yes, delete my account </button>
                    <button class="small" id="edit" onclick="location.href='details.php'" type="button"> No, go back to details </button>
				</div>
			</div>

		</div>
		<?php include("../Elem_site/footer.php"); ?>
	</div>
</body>

</html>