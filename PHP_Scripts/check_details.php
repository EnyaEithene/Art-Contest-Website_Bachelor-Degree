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
					Va rugam sa reveniti la pagina anterioara.
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
?>