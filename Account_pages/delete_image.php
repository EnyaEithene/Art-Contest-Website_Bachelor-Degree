<?php
session_start();
include("../PHP_Scripts/db_connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title> Stergere din Galerie </title>
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
                        <h1> Stergere din Galerie </h1>
                    </div>

                    <!-- Continut pagina -->
                    <?php
                    // Preluare id competitie
                    $ID_contest = $_GET['id'];

                    // Preluare date din formular
                    foreach ($_POST['img'] as $img) {
                        // Stergere imagine din baza de date
                        $query = 'delete from arta_participanti
                                    where id = ' . $img;

                        // Stergere imagine din folder
                    
                        if ($insert) {
                            echo '<div> 
                                    Stergerea a fost facuta cu succes! <br>
                                    Reveniti la <a id="link" href="gallery.php">galerie</a>.
                                </div>';
                        } else {
                            echo '<div id="row">
                                    <p id="column" style="color:#cf3266;text-align:center">
                                        <strong>Eroare:</strong> Stergerea nu a putut avea loc. Incercati din nou mai tarziu.
                                        Reveniti la <a id="link" href="../Main_pages/competitions.php">competitii</a>.
                                    </p>
                                </div>';
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