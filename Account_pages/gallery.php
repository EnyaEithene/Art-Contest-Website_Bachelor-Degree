<?php session_start();
include("../PHP_Scripts/db_connect.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title> User's Gallery </title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
	<?php include('../Elem_site/menu.php'); ?>

	<?php include('../Elem_site/logo.php'); ?>

	<?php include('../Elem_site/user_side_menu.php'); ?>

	<div class="main">
		<div id="row">
			<div id="column">
				<div>
					<h1> Gallery </h1>
				</div>

				<fieldset>
					<legend>Upload art</legend>
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<input type="file" name="fisier" id="fisier">
						<button id="upload" class="small" type="submit"> Upload </button>
					</form>
				</fieldset> <br>

				<!--
				<fieldset>
					<legend> Aranjare galerie</legend>
					<form action="gallery_edit.php" method="post">

					</form>
				</fieldset>
				-->

				<div>
					<h1> Uploaded images </h1>
					<?php
					$sql = 'select * from arta_participanti where id_participant="' . $_SESSION['ID'] . '";';
					$result = $db->query($sql);
					$num_results = $result->num_rows;

					if ($num_results != 0) {
						for ($i = 0; $i < $num_results; $i++) {
							$row = $result->fetch_assoc();
							//echo ;
							echo '<a href="gallery_image.php?id=' . $row['id'] . '">
									<img class="gallery" src="../Images/uploaded_img/' . stripslashes($row['id_participant']) . '_imagine_' . stripslashes($row['id']) . '.jpeg"></img>
								</a><br><br>';
						}
					} else {
						echo "<div> You haven't uploaded any images yet </div>";
					}
					?>
				</div>

			</div>
		</div>
	</div>

	<?php include('../Elem_site/footer.php'); ?>

</body>

</html>