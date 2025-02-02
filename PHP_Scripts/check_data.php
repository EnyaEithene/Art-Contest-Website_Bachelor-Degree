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
				<p id="column" style="color:#cf3266;">
					Eroare: ' . $error_type . ' <br><br>
					Reveniti la pagina de inregistrare: <button id="purple" class="small"><a href="register_page.php">Register</a></button>
				</p>
			</div>';
        exit;
    }
}

// nume
if (!$nume) {
    $error_nume = "Numele este obligatoriu.";
    error_alert($error_nume);
} else {
    $test_nume = test_input($nume);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $test_nume)) {
        $error_nume = "Doar litere si spatii sunt acceptate in nume.";
        error_alert($error_nume);
    }
}

//prenume
if (!$prenume) {
    $error_prenume = "Prenumele este obligatoriu.";
    error_alert($error_prenume);
} else {
    $test_prenume = test_input($prenume);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $test_prenume)) {
        $error_prenume = "Doar litere si spatii sunt acceptate in prenume.";
        error_alert($error_prenume);
    }
}

// email
if (!$email) {
    $error_email = "E-mailul este obligatoriu.";
    error_alert($error_email);
} else {
    $test_email = test_input($email);
    if (!filter_var($test_email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Nu ati introdus o adresa de e-mail valida.";
        error_alert($error_email);
    }
}

// telefon (camp optional)
if ($tel) {
    $test_tel = test_input($tel);
    if (!preg_match("/^[0-9\+]{10,13}$/", $test_tel)) {
        $error_tel = "Numarul de telefon nu este valid.";
        error_alert($error_tel);
    }
}
// Verificare: select '1234567890' regexp '^[0-9\+]{10,13}$';    -> 1
//             select '+401234567890' regexp '^[0-9\+]{10,13}$'; -> 1
//             select 'a401234567890' regexp '^[0-9\+]{10,13}$'; -> 0

// parola (minim de siguranta)
$tipar_pass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
if (!$pass) {
    $error_pass = "Parola este obligatorie.";
    error_alert($error_pass);
} else {
    $test_pass = test_input($pass);
    // verificare lungime parola
    if (!preg_match($tipar_pass, $test_pass)) {
        $error_pass = "Parola trebuie sa fie de minim 8 caractere, care sa contina minim o litera mare, o litera mica, o cifra si un caracter special.";
        error_alert($error_pass);
    }
    // confirmare parola
    if (!$confirmPass) {
        $error_pass = "Confirmarea parolei este obligatorie.";
        error_alert($error_pass);
    } else {
        if ($pass != $confirmPass) {
            $error_pass = "Nu ati confirmat corespunzator parola.";
            error_alert($error_pass);
        }
    }
}

// Verificare daca mail-ul a mai fost utilizat de catre un alt cont
$check_select = $db->query("select email 
			                from conturi 
			                where email='" . $email . "'");
// Eroare daca exista deja un cont cu acest mail
if (mysqli_num_rows($check_select) > 0) {
    echo '<div id="row">
				<p id="column" style="color:#cf3266;">
					Eroare: Exista un utilizator cu acest email. <br><br>
					Reveniti la pagina de inregistrare: <button id="purple" class="small"><a href="register_page.php">Register</a></button>
				</p>
			</div>';
    exit;
}
?>