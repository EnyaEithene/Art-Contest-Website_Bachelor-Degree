<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<i>
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
		echo '<div id="row">
			    	<p id="column" style="color:#cf3266;text-align:center">
				      <strong>Error:</strong> You did not fill in all the required fields.
			      </p>
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
  echo '<div id="page_stack">
          <div id="row">
				    <img id="left" src="../Images/website_img/welcome.jpeg">
				    <p id="column" style="color:#cf3266;">
					    Congratulations! You are now registered as a contestant. <br><br>
					    Please login: <button id="purple" class="small"><a href="login_page.php">Log into account</a></button>
				    </p>
			    </div>
        </div>';
  } else {
  echo '<div id="row">
              <p id="column" style="color:#cf3266;text-align:center">
                <strong>Error:</strong> Something went wrong. Please try again later. 
              </p>
            </div>';		
  }
	$db->close();
	?>

	<?php include('../Elem_site/menu.php'); ?>
	<?php include('../Elem_site/footer.php'); ?>
</body>

</html>
