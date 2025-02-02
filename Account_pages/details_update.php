<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Account details </title>
    <link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
    <?php include('../Elem_site/menu.php'); ?>

    <?php include('../Elem_site/logo.php'); ?>

    <?php include('../Elem_site/user_side_menu.php'); ?>

    <div class="main">
        <div id="row">
            <div id="column">
                <?php
                // Preluare variabile din formularul de pe pagina details_edit.php
                $nume = $_POST['nume'];
                $prenume = $_POST['prenume'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];

                // Conectare la baza de date
                include("../PHP_Scripts/db_connect.php");

                // Verificare format date introduse
                include("../PHP_Scripts/check_details.php");

                // Actualizare date
                $query = 'UPDATE conturi
                            SET nume="' . $nume . '", prenume="' . $prenume . '", email="' . $email . '", telefon="' . $tel . '"
                            WHERE email="' . $_SESSION['ID'] . '"';

                $update = $db->query($query);

                if ($update) {
                    $_SESSION['ID'] = $email;
                    $_SESSION['nume'] = $nume;
                    $_SESSION['prenume'] = $prenume;
                    $_SESSION['email'] = $email;
                    $_SESSION['tel'] = $tel;

                    echo '<div id="row">
						<p id="column" style="text-align:center;">
							Datele au fost editate cu succes! <br><br>
					        Reveniti la pagina de detalii: <button id="purple" class="small"><a href="details.php">Details</a></button>
						</p>
					</div>';
                    exit;
                } else {
                    echo '<div id="row">
						<p id="column" style="color:#cf3266;text-align:center">
							<strong>Eroare:</strong> Nu au putut fi editate datele.
						</p>
					</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <?php include('../Elem_site/footer.php'); ?>

</body>

</html>