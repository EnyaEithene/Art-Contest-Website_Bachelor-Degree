<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../PHP_Scripts/db_connect.php');
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

                    $query = 'delete from participari 
                            	where ID_competitie = "'. $ID .'" 
								and ID_participant = "'. $_SESSION['ID'] .'";';

					if($db->query($query)){
						echo '<div id="row">
                                <div id="column">
                                    Your participation was deleted. <br><br>
									You can return to the competition list <a id="link" href="../Main_pages/competitions.php">here</a>.
                                </div>
                            </div>';
					} else {
						echo "<div id='row'>
                                <p id='column' style='color:#cf3266;text-align:center'>
                                    <strong>Error:</strong> We couldn't delete the entry for this competition. Try again later.
                                </p>
                            </div>";
					}
                 ?>
			</div>
		</div>

	</div>
	
	<?php include("../Elem_site/footer.php"); ?>
</body>

</html>