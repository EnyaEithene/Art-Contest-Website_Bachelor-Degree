<?php
session_start();
include("../PHP_Scripts/db_connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title> Sign up </title>
    <link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
    <?php include('../Elem_site/menu.php'); ?>

    <?php include('../Elem_site/logo.php'); ?>

    <div class="page_stack">
        <div id="row">
            <div id="column">
                <!-- Continut pagina -->
                <?php
                // Preluare id competitie
                $ID_contest = $_GET['id'];

                // Stergere participare anterioara pentru cazul in care isi schimba desenul
                $delete = $db->query('delete from participari where ID_competitie = '. $ID_contest .' and ID_participant = "'. $_SESSION['ID'] .'";');

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
                                 Your drawing was succesfully signed up <br>
                                 Return to the <a id="link" href="../Main_pages/competitions.php">competitions page</a>.
                            </div>';
                    } else {
                        echo '<div id="row">
                                 <p id="column" style="color:#cf3266;text-align:center">
                                       <strong>Erorr:</strong> Nu a putut fi inscris desenul. Incercati din nou mai tarziu.
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
</body>

</html>