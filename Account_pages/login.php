<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="../websiteStyle.css">

</head>

<body>

	<?php include('../Elem_site/logo.php'); ?>

	<?php
	session_start();

	// datele din formular
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	if (!$email || !$pass) {
		echo '<div id="row">
				<p id="column" style="color:#cf3266;text-align:center">
					<strong>Eroare:</strong> Nu ai completat toate casutele.
				</p>
			</div>';

		exit;
	}

	include("../PHP_Scripts/db_connect.php");

	$check_select = $db->query("select nume, prenume, email, telefon, rol_competitie
									from conturi 
									where email='" . $email . "' and password='" . $pass . "'");

	if (mysqli_num_rows($check_select) > 0) {

		$result = $check_select->fetch_assoc();
		$_SESSION['ID'] = $result['email'];
		$_SESSION['loggedin'] = true;

		// Stocare date utilizator
		//nume
		$_SESSION['nume'] = $result['nume'];
		//prenume
		$_SESSION['prenume'] = $result['prenume'];
		//email
		$_SESSION['email'] = $result['email'];
		//telefon
		$_SESSION['tel'] = $result['telefon'];
		//rol competitie
		$_SESSION['rol'] = $result['rol_competitie'];

		echo '<div id="row">
						<p id="column" style="text-align:center;">
							Bine ai venit, ' . $_SESSION['prenume'] . '! <br><br>
							<a id="link" href="details.php">Acceseaza-ti contul</a> sau <a id="link" href="../Main_pages/competitions.php">vezi ce competitii sunt active</a>!
						</p>
					</div>';

	} else {
		echo '<!-- Mesaj de eroare -->
					<div id="row">
						<p id="column" style="color:#cf3266;text-align:center">
							<strong>Eroare:</strong> Email-ul sau parola nu este corecta.
						</p>
					</div>

				  <!-- Formular pagina Login -->
					<div id="form_stack">
						<div id="inline-div">
							<button id="gray"><a href="register_page.php">Register new account</a></button>
							<button id="purple"><a href="login_page.php">Log into account</a></button>
						</div>
						<div style="text-align:center;">
							<form action="login.php" method="POST">
								
								<div class="form-group">
									<label for="email"> E-mail </label>
									<input type="text" name="email">
								</div>
								
								<div class="form-group">
									<label for="pass"> Parola </label>
									<input type="text" name="pass">
								</div>
								
								<button id="login" type="submit"> Login </button>
						</div>
						</form>
					</div>
					';
		//exit;
	}
	$db->close();

	?>

	<?php include('../Elem_site/menu.php'); ?>

	<?php include('../Elem_site/footer.php'); ?>

</body>

</html>