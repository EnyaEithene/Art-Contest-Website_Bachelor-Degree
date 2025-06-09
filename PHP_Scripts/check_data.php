<?php
// $error_nume = $error_prenume = $error_email = $error_tel = $error_pass = "";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function error_alert($error_type)
{
    if ($error_type) {
        echo '<div id="row">
				<p id="column" style="color:#cf3266;text-align:center"">
					<strong>Error:</strong> ' . $error_type . ' <br><br>
					Return to the account registration page: <button id="purple" class="small"><a href="register_page.php">Register</a></button>
				</p>
      </div>';
        // exit;
    }
}

// Verificare ca toate datele obligatorii au fost completate
if (!$nume || !$prenume || !$email || !$pass || !$confirmPass) {
  $error = "You did not fill in all the required fields.";
  error_alert($error);
}
	
// nume
if (!$nume && !isset($error)) {
    $error = "Last name is mandatory.";
    error_alert($error);
} else {
    $test_nume = test_input($nume);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $test_nume) && !isset($error)) {
        $error = "The last name can only contain letters, spaces and the symbols ', -.";
        error_alert($error);
    }
}

//prenume
if (!$prenume && !isset($error)) {
    $error = "First name is mandatory.";
    error_alert($error);
} else {
    $test_prenume = test_input($prenume);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $test_prenume) && !isset($error)) {
        $error = "The first name can only contain letters, spaces and the symbols ', -.";
        error_alert($error);
    }
}

// email
if (!$email && !isset($error)) {
    $error = "E-mail is mandatory.";
    error_alert($error);
} else {
    $test_email = test_input($email);
    if (!filter_var($test_email, FILTER_VALIDATE_EMAIL) && !isset($error)) {
        $error = "The given email address is not valid.";
        error_alert($error);
    }
}

// telefon (camp optional)
if ($tel && !isset($error)) {
    $test_tel = test_input($tel);
    if (!preg_match("/^[0-9\+]{10,13}$/", $test_tel) && !isset($error)) {
        $error = "The given phone number is not valid.";
        error_alert($error);
    }
}
// Verificare: select '1234567890' regexp '^[0-9\+]{10,13}$';    -> 1
//             select '+401234567890' regexp '^[0-9\+]{10,13}$'; -> 1
//             select 'a401234567890' regexp '^[0-9\+]{10,13}$'; -> 0

// parola (minim de siguranta)
$tipar_pass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
if (!$pass && !isset($error)) {
    $error = "Password is mandatory.";
    error_alert($error);
} else {
    $test_pass = test_input($pass);
    // verificare lungime parola
    if (!preg_match($tipar_pass, $test_pass) && !isset($error)) {
        $error = "The password needs to be at least 8 characters long, and contain at a minimum one uppercase letter, one lowercase letter, a digit and a special character.";
        error_alert($error);
    }
    // confirmare parola
    if (!$confirmPass && !isset($error)) {
        $error = "Password confirmation is mandatory.";
        error_alert($error);
    } else {
        if ($pass != $confirmPass && !isset($error)) {
            $error = "The password confirmation doesn't match the given password.";
            error_alert($error);
        }
    }
}

// Verificare daca mail-ul a mai fost utilizat de catre un alt cont
$check_select = $db->query("select email 
			                from conturi 
			                where email='" . $email . "'");
// Eroare daca exista deja un cont cu acest mail
if (mysqli_num_rows($check_select) > 0 && !isset($error)) {
    $error = "The given email is already used by another registered user.";
    error_alert($error);
}
?>
