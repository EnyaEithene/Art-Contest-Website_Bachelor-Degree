<?php
session_start();

// Specificare cale catre directorul unde va fi stocat fisierul
$calea = "../Images/uploaded_img/";

// Specificare nume complet al fisierului care va fi creat pe server
$id = $_SESSION['ID'];
$target_file = $calea . basename($_FILES["fisier"]["name"]);
$uploadOk = 1;

// Preluare numar imagine
@$db = new mysqli('localhost', 'webuser', 'webuser', 'competitii_arta');
if (mysqli_connect_errno()) {
	echo '<div id="row">
				<p id="column" style="color:#cf3266;">
					Eroare: Conexiunea la serverul mysql nu s-a facut. Incercati mai tarziu.
				</p>
			</div>';
	exit;
}

// Determinam extensie fisier
$tip_fisier = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
echo $tip_fisier;

// Verificare daca fisierul deja exista
if (file_exists($target_file)) {
	echo "Fisierul exista.";
	$uploadOk = 0;
} else {
	echo $target_file;
	// Verificare fisier pe care urmeaza sa fie stocat
	if (isset($_POST["submit"])) {
		// Determinare dimensiuni fisier imagine
		$check = getimagesize($_FILES["fisier"]["tmp_name"]);
		if ($check !== false) {
			echo "este fisier imagine - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "nu e fisier imagine.";
			$uploadOk = 0;
		}
	}

	// Verificare ca fisierul sa fie doar de tip imagine 
	if ($tip_fisier != "jpeg") {
		echo "se incarca numai fisiere tip jpeg.";
		$uploadOk = 0;
	}

	if ($uploadOk == 1) {
		// Stocare locatie fisier in tabelul "arta_participanti"
		$new_name = '1';
		$query = "insert into arta_participanti(id_participant) values 
						('" . $id . "');";
		$result = $db->query($query);

		$q = 'select max(id) as max_id from arta_participanti where id_participant = "' . $id . '"';

		$result = $db->query($q);
		$nr = $result->fetch_assoc();

		// Redenumire fisier
		$new_name = $calea . $id . "_imagine_" . $nr['max_id'] . "." . $tip_fisier;
		//rename($target_file,$new_name);echo $target
		echo $new_name;
		if (move_uploaded_file($_FILES['fisier']['tmp_name'], $new_name)) {
			echo "Fisierul a fost incarcat cu succes!";
		}
	} else {
		echo "Fisierul nu a fost incarcat";
		$_SESSION['count'] = $_SESSION['count'] - $_SESSION['add'];
	}
}
?>