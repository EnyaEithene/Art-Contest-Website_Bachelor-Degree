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
    where ID_participant = "' . $_SESSION['ID'] . '"
    limit 1';

//echo $select;

$check = $db->query($select);
?>

<!DOCTYPE html>
<html>

<head>
    <title> Competitie </title>
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
                        <h1>
                            <?php echo $row['nume']; ?>
                        </h1>
                        <h2>
                            <?php
                            switch ($_SESSION['rol']) {
                                case 0:
                                    if (mysqli_num_rows($check) == 0) {
                                        echo '<a href="competitions_inscriere.php?id=' . $ID . '";>
                                                        <button class="small" id="purple">
                                                            Participa
                                                        </button>
                                                    </a>';
                                    } else {
                                        echo '<a href="competitions_schimbare.php?id=' . $ID . '">
                                                        <button class="small" id="purple">
                                                            Schimba desenul
                                                        </button>
                                                    </a>
                                                    <a href="competitions_stergere.php?id=' . $ID . '">
                                                        <button class="small" id="purple">
                                                            Sterge participarea
                                                        </button>
                                                    </a>';
                                    }
                                    break;
                                case 1:
                                    break;
                            }
                            ?>
                        </h2>
                    </div>

                    <?php
                    // Afisare date competitie
                    if (mysqli_num_rows($result) > 0) {
                        echo ' <p> Tip: ' . $row['tip'] . ' </p>
                                <p style="font-style: italic;"> Perioada desfasurare: ' . $row['inceput'] . '-' . $row['final'] . ' </p>
                                <h3> Descriere </h3>
                                <h5> ' . $row['descriere'] . ' </h5>';
                    } else {
                        echo '<div id="row">
                                <p id="column" style="color:#cf3266;text-align:center">
                                    <strong>Eroare:</strong> Nu putem gasi date despre aceasta competitie. Incercati din nou mai tarziu.
                                </p>
                            </div>';
                    }
                    echo '</div>
                        </div>';

                    $query = 'select * from participari';
                    $take = $db->query($query);

                    if (!$take) {
                        echo '<div>
                                Nu exista inscrieri.
                            </div>';
                    } else {
                        echo '<div id="row">
                                <div id="column">
                                    <h2>Participari</h2>
                                </div>
                            </div>';

                        // Afisare desene inscrise
                        switch ($_SESSION['rol']) {
                            case 0:                                     // Participant
                                while ($row = $take->fetch_assoc()) {
                                    echo '<div id="row">
                                            <img id="left" src="../Images/uploaded_img/' . $row['ID_participant'] . '_imagine_' . $row['ID_imagine'] . '.jpeg"><br><br>
                                        </div>';
                                }
                                break;
                            case 1:                                       // Jurat
                                while ($row = $take->fetch_assoc()) {
                                    echo '<div id="row">
                                            <img id="left" src="../Images/uploaded_img/' . $row['ID_participant'] . '_imagine_' . $row['ID_imagine'] . '.jpeg"><br><br>';
                                    echo '<div id="column">
                                            <div class="rating">
                                                <input class="star" id="rating5" type="radio" name="rating" value="5">
                                                <label for="rating5"></label>
                                                <input class="star" id="rating4" type="radio" name="rating" value="4">
                                                <label for="rating4"></label>
                                                <input class="star" id="rating3" type="radio" name="rating" value="3">
                                                <label for="rating3"></label>
                                                <input class="star" id="rating2" type="radio" name="rating" value="2">
                                                <label for="rating2"></label>
                                                <input class="star" id="rating1" type="radio" name="rating" value="1">
                                                <label for="rating1"></label>
                                            </div>

                                            <script>
                                                async function submitRating(rating) {
                                                    try {
                                                        const response = await fetch("save-rating.php", {
                                                            method: "POST",
                                                            headers: { "Content-Type": "application/json" },
                                                            body: JSON.stringify({ rating }),
                                                        });
                                                        const result = await response.json();
                                                        alert(result.message);
                                                    } catch (error) {
                                                        console.error("Error:", error);
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>';
                                }
                                break;
                        }
                    }
                    ?>
                </div>
                <?php include("../Elem_site/footer.php"); ?>
            </div>
</body>

</html>