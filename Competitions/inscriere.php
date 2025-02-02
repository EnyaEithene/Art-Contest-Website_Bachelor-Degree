<?php
session_start();
include("../PHP_Scripts/db_connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title> titlu pagina </title>
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
                        <h1> </h1>
                    </div>

                    <!-- Continut pagina -->
                    <?php
                    // Preluare id competitie
                    $ID_contest = $_GET['id'];

                    // Preluare date din formular
                    foreach ($_POST['img'] as $img) {
                        // Instructiune SQL pentru a incarca participarea in BD
                        $query = 'insert into participari 
                                    (ID_competitie,ID_participant,ID_Imagine) 
                                    values 
                                    (' . $ID_contest . ',"' . $_SESSION['ID'] . '",' . $img . ')';

                        $insert = $db->query($query);

                        if ($insert) {
                            echo '<div> 
                                    Desenul a fost inscris cu succes! <br>
                                    Reveniti la <a id="link" href="../Main_pages/competitions.php">competitii</a>.
                                </div>';
                        } else {
                            echo '<div id="row">
                                    <p id="column" style="color:#cf3266;text-align:center">
                                        <strong>Eroare:</strong> Nu a putut fi inscris desenul. Incercati din nou mai tarziu.
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