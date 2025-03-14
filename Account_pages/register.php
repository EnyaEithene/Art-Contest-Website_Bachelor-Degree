<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
	<?php include('../Elem_site/logo.php'); ?>

	<?php

	// Datele din formular
	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$pass = $_POST['pass'];
	$confirmPass = $_POST['confirmPass'];

	// Verificare ca toate datele obligatorii au fost completate
	if (!$nume || !$prenume || !$email || !$pass || !$confirmPass) {
		echo ' <div> 
				Nu ai completat toate casutele obligatorii.
			</div>';
		exit;
	}

	// Conectare la baza de date
	include("../PHP_Scripts/db_connect.php");

	// Verificare date formular
	include("../PHP_Scripts/check_data.php");


	// Instructiuni pentru incarcarea datelor in tabelul "conturi"
	$query = "insert into conturi(nume, prenume, email, telefon, parola) values 
            ('" . $nume . "', '" . $prenume . "', '" . $email . "', '" . $tel . "', '" . $pass . "');";


	// Instructiuni de testare
	//echo $query;
	//echo "<br>";
	
	// Rulare $query -> incarcare date formular
	$result = $db->query($query);
	if ($result) {
		echo '<div id="row">
				<p id="column" style="color:#cf3266;">
					Felicitari! Sunteti logat ca participant. <br><br>
					Va rugam sa va logati: <button id="purple" class="small"><a href="login_page.php">Log into account</a></button>
				</p>
			</div>';
	}
	$db->close();
	?>

	<?php include('../Elem_site/menu.php'); ?>
	<?php include('../Elem_site/footer.php'); ?>
</body>

</html>