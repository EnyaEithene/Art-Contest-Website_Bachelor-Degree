<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>

<head>
	<title> Upload to gallery </title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>

  <?php include('../Elem_site/menu.php'); ?>
  <?php include('../Elem_site/logo.php'); ?>

  <div class="page-stack">
			<div id="row">
				<div id="column">
					<div>
						<h1> Image upload </h1>
					</div>

					<?php
					// Date formular
					$titlu = $_POST['titlu'];
					$desc = $_POST['desc'];

					// Verificare date formular
					if (!$titlu) {
						echo '<div id="row">
								<p id="column" style="color:#cf3266;text-align:center">
									<strong>Error:</strong> All the required fields need to be filled in.
								</p>
							</div>';
						exit;
					}

					// Specificare cale catre directorul unde va fi stocat fisierul
					$calea = "../Images/uploaded_img/";

					// Specificare nume complet al fisierului care va fi creat pe server
					$id = $_SESSION['ID'];
					$target_file = $calea . basename($_FILES["fisier"]["name"]);
					$uploadOk = 1;

					include('../PHP_Scripts/db_connect.php');

					// Determinam extensie fisier
					$tip_fisier = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
					// echo $tip_fisier;

					// Verificare daca fisierul deja exista
					if (file_exists($target_file)) {
						// echo "Fisierul exista.";
						echo '<div id="row">
								<p id="column" style="color:#cf3266;">
									<strong>Erorr:</strong> File already exists.
								</p>
							</div>';
						$uploadOk = 0;
					} else {
						//echo $target_file;
						// Verificare fisier pe care urmeaza sa fie stocat
						if (isset($_POST["submit"])) {
							// Determinare dimensiuni fisier imagine
							$check = getimagesize($_FILES["fisier"]["tmp_name"]);
							if ($check !== false) {
								echo "este fisier imagine - " . $check["mime"] . ".";
								$mime = $check["mime"];
								$uploadOk = 1;
							} else {
								// echo "nu e fisier imagine.";
								echo '<div id="row">
										<p id="column" style="color:#cf3266;">
											<strong>Error:</strong> File is not an image.
										</p>
									</div>';
								$uploadOk = 0;
							}
						}

						// Verificare ca fisierul sa fie doar de tip imagine 
						if ($tip_fisier != "jpeg") {
							// echo "se incarca numai fisiere tip jpeg.";
							echo '<div id="row">
										<p id="column" style="color:#cf3266;">
											<strong>Error:</strong> Only images of .jpeg format are accepted, as specified on <a href="../Main_pages/info.php"> Informations</a>.
										</p>
									</div>';
							$uploadOk = 0;
						}

						if ($uploadOk == 1) {
							// Stocare locatie fisier si date valide in tabelul "arta_participanti"
							$new_name = '1';
							//echo "test";
							echo $mime;
							$query = "insert into arta_participanti(id_participant,titlu,descriere,marime) values 
											('" . $id . "','" . $titlu . "','" . $desc . "','".$mime."');";
							$result = $db->query($query);

							$q = 'select max(id) as max_id from arta_participanti where id_participant = "' . $id . '"';

							$result = $db->query($q);

							$nr = $result->fetch_assoc();

							// Redenumire fisier
							$new_name = $calea . $id . "_imagine_" . $nr['max_id'] . "." . $tip_fisier;
							//rename($target_file,$new_name);echo $target
							//echo $new_name;
							if (move_uploaded_file($_FILES['fisier']['tmp_name'], $new_name)) {
								// echo "Fisierul a fost incarcat cu succes!";
								echo '<div id="page_stack">
										<div id="row">
											<p id="column" style="text-align:center;">
												Your image was uploaded in your gallery! <br><br>
												<a id="link" href="gallery.php">Go back to your gallery.</a>
											</p>
											<img id="right" src="../Images/website_img/welcome.jpeg">
										</div>
								</div>';
							}
						} else {
							// echo "Fisierul nu a fost incarcat";
							echo '<div id="row">
										<p id="column" style="color:#cf3266;">
											<strong>Error:</strong> File was not uploaded. Try again later.
										</p>
									</div>';
							$_SESSION['count'] = $_SESSION['count'] - $_SESSION['add'];
						}
					}
					?>
				</div>
		</div>
		<?php include("../Elem_site/footer.php"); ?>
	</div>
</body>

</html>
