<?php
session_start();
include('../PHP_Scripts/db_connect.php');
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
	<div class="page-container">
		<div class="content-wrap">
			<?php include('../Elem_site/menu.php'); ?>

			<?php include('../Elem_site/logo.php'); ?>

			<div id="row">
				<div id="column">
					<div>
						<h1> Image deletion </h1>
					</div>

					<?php
                        // Date formular
                        $idImagine = $_POST['id_img'];
                        //echo $idImagine;

                        // Recreere adresa imagine
                        $adresa = '../Images/uploaded_img/' . stripslashes($_SESSION['ID']) . '_imagine_' . stripslashes($idImagine) . '.jpeg';

                        // Stergere din BD
                        $query = "delete from arta_participanti
                                  where ID = ". $idImagine ." and ID_participant = '". $_SESSION['ID']."';"; 
                        $delete = $db->query($query);

                        //echo $query;

                        if (mysqli_affected_rows($db) > 0) {
                            unlink($adresa);
                            if (!file_exists($adresa)){
                                echo '<div id="page_stack">
                                    <div id="row">
                                        <p id="column" style="text-align:center;">
                                            The image was succesfully deleted. <br>
                                            <button class="small" id="edit" onclick="location.href=\'gallery.php\'" type="button"> Return to gallery </button>
                                        </p>
                                        <img id="right" src="../Images/website_img/welcome.jpeg">
                                    </div>
                            </div>';
                            } else {
                                echo "<!-- Mesaj de eroare -->
                                    <div id='row'>
                                        <p id='column' style='color:#cf3266;text-align:center'>
                                            <strong>Error:</strong> Couldn't delete image. Try again later
                                        </p>
                                    </div>";
                            }
                        }
                    ?>

				</div>
			</div>

		</div>
		<?php include("../Elem_site/footer.php"); ?>
	</div>
</body>

</html>