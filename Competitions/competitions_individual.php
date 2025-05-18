<?php
session_start();
include("../PHP_Scripts/db_connect.php");
// Variabila extrase din link 
$ID = $_GET['id'];
//Extragere date competitie din baza de date 
$query = 'select nume, tip, descriere, DATE_FORMAT(data_inceput,"%d.%m.%Y") AS inceput, DATE_FORMAT(data_final,"%d.%m.%Y") as final 
            from competitii 
            where ID=' . $ID;
$result = $db->query($query);

$row = $result->fetch_assoc();

// Verificare daca utilizatorul s-a inscris deja la acest concurs
$select = 'select *
    from participari
    where ID_participant = "' . $_SESSION['ID'] . '" and ID_competitie = '. $ID . ';';

$check = $db->query($select);
$col = $check->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Competition </title>
    <link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
        <?php include('../Elem_site/menu.php'); ?>

        <?php include('../Elem_site/logo.php'); ?>

        <div id="page_stack">
            <div id="row">
                <div id="column">
                    <div>
                        <h1>
                            <?php echo $row['nume']; ?>
                        </h1>
                        <h2>
                            <?php
                            switch ($_SESSION['rol']) {
                                case 0:                     // Paticipant
                                    if (!$col) {    // Nu are imagini inscrise
                                        echo '<a href="competitions_inscriere.php?id=' . $ID . '";>
                                                        <button class="small" id="purple">
                                                            Sign up
                                                        </button>
                                                    </a>';
                                    } else {        // Are imagini inscrise
                                        echo '<a href="competitions_inscriere.php?id=' . $ID . '">
                                                        <button class="small" id="purple">
                                                            Change image
                                                        </button>
                                                    </a>
                                                    <a href="competitions_stergere.php?id=' . $ID . '">
                                                        <button class="small" id="purple">
                                                            Leave contest
                                                        </button>
                                                    </a>';
                                    }
                                    break;
                                case 1:                        // Jurat (fara butoane)
                                    break;
                            }
                            ?>
                        </h2>
                    </div>

                    <?php
                    // Afisare date competitie
                    if (mysqli_num_rows($result) > 0) {
                        echo ' <p> Type: ' . $row['tip'] . ' </p>
                                <p style="font-style: italic;"> Duration: ' . $row['inceput'] . '-' . $row['final'] . ' </p>
                                <h3> Description </h3>
                                <h5> ' . $row['descriere'] . ' </h5>';
                    } else {
                        echo "<div id='row'>
                                <p id='column' style='color:#cf3266;text-align:center'>
                                    <strong>Error:</strong> We can't find any data about this contest. Try again later.
                                </p>
                            </div>";
                    }
                    echo '</div>
                        </div>';
                    
                    echo '<div id="row">
                            <div id="column">
                                <h2>Contestants</h2>
                            </div>
                         </div>';


                    $query = 'select * from participari where ID_competitie ='. $ID;
                    $take = $db->query($query);
                    $num_rows = $take->num_rows;

                    if ($num_rows == 0) {
                        echo '<div id="row">
                                <div id="column">
                                    No one is participating yet.
                                </div>
                            </div>';
                    } else {
                        // Afisare desene inscrise
                        switch ($_SESSION['rol']) {
                            case 0:                                     // Participant
                                while ($row = $take->fetch_assoc()) {
                                    // Preluare date desen
                                    $q = "select * from arta_participanti where ID = ". $row['ID_imagine']." and ID_participant = '". $row['ID_participant']."'";
                                    $data = $db->query($q);  
                                    $dataRow = $data->fetch_assoc();
                                    
                                    // Preluare nume artist
                                    $qq = "select nume, prenume from conturi where email = '". $row['ID_participant'] ."';";
                                    $getName = $db->query($qq);
                                    $name = $getName->fetch_assoc();

                                    // Afisare desen
                                    echo '<div id="row">
                                            <img id="left" src="../Images/uploaded_img/' . $row['ID_participant'] . '_imagine_' . $row['ID_imagine'] . '.jpeg"><br><br>
                                        <p id="column">
                                            <table style="font-size:1.5vw">
                                            <tr>
                                                <th style="font-size:3vw"> ' . $dataRow['titlu'] . ' </th>
                                            </tr>
                                            <tr>
                                                <th> Artist </th>
                                                <td> ' . $name['nume'] . ' '. $name['prenume'] .' </td>
                                            </tr>
                                            <tr>
                                                <th> Description </th>
                                                <td> ' . $dataRow['descriere'] . ' </td>
                                            </tr>
                                        </table>
                                        </p>
                                        </div>';
                                }
                                break;
                            case 1:                                       // Jurat
                                while ($row = $take->fetch_assoc()) {
                                    echo '
                                    <div id="row">
                                        <img id="left" src="../Images/uploaded_img/' . $row['ID_participant'] . '_imagine_' . $row['ID_imagine'] . '.jpeg"><br><br>
                                        <div id="column">
                                            <form method="POST" action="save_rating.php">
                                                <input type="hidden" name="ID_participare" value="' . $row['ID'] . '">
                                                <input type="hidden" name="ID_jurat" value="' . $_SESSION['ID'] . '">
                                                <input type="hidden" name="ID_competitie" value="' . $ID . '">

                                                New grade:

                                                <div class="rating">
                                                    <input class="star" id="rating5" type="radio" name="rating[]" value="5" onchange="this.form.submit();">
                                                    <label for="rating5"></label>

                                                    <input class="star" id="rating4" type="radio" name="rating[]" value="4" onchange="this.form.submit();">
                                                    <label for="rating4"></label>

                                                    <input class="star" id="rating3" type="radio" name="rating[]" value="3" onchange="this.form.submit();">
                                                    <label for="rating3"></label>

                                                    <input class="star" id="rating2" type="radio" name="rating[]" value="2" onchange="this.form.submit();">
                                                    <label for="rating2"></label>

                                                    <input class="star" id="rating1" type="radio" name="rating[]" value="1" onchange="this.form.submit();">
                                                    <label for="rating1"></label>
                                                </div>
                                            </form><br><br><br>
                                        ';

                                    $sql = "SELECT Nota FROM note_competitii WHERE ID_jurat = '".$_SESSION['ID']."' AND ID_participare = ".$row['ID'];
                                    $res = $db->query($sql);
                                    $current_rating = null;
                                    if ($res && $rating_row = $res->fetch_assoc()) {
                                        $current_rating = $rating_row['Nota'];
                                    }
                            
                                    echo 'Current grade: 
                                            <div class="rating">';
                                    for ($i = 5; $i >= 1; $i--) {
                                        $checked = ($current_rating == $i) ? 'checked' : '';
                                        echo '<input class="star" id="rating' . $i . '_' . $id_participare . '" type="radio" name="rating_' . $id_participare . '" value="' . $i . '" ' . $checked . ' disabled>
                                              <label for="rating' . $i . '_' . $id_participare . '"></label>';
                                    }
                                    echo '</div></div></div>';
                                }
                                break;
                        }
                    }
                    ?>
                </div>
                <?php include("../Elem_site/footer.php"); ?>
</body>

</html>