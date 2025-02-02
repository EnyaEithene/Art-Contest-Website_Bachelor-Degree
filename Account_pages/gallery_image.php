<?php
session_start();
include("../PHP_Scripts/db_connect.php");

// Preluare date din link-ul paginii
$idImagine = $_GET['id'];

// Preluare date imagine din baza de date
$query = 'select * from arta_participanti where id=' . $idImagine . ';';
$take = $db->query($query);

if (mysqli_num_rows($take) > 0) {
    $row = $take->fetch_assoc();

    $titlu = $row['titlu'];
    $descriere = $row['descriere'];
    $marime = $row['marime'];
    $data_incarcare = $row['data_incarcare'];
} else {
    echo '<div id="row">
			<p id="column" style="color:#cf3266;text-align:center">
				<strong>Eroare:</strong> Nu s-au putut incarca datele imaginii.
			</p>			
        </div>';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> <?php echo $titlu; ?> </title>
    <link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
    <?php include('../Elem_site/menu.php'); ?>

    <?php include('../Elem_site/logo.php'); ?>

    <div id="row">
        <?php
        echo '<img id="left" src="../Images/uploaded_img/' . stripslashes($_SESSION['ID']) . '_imagine_' . stripslashes($idImagine) . '.jpeg">
                <p id="column">
                    <table style="font-size:1.5vw">
					<tr>
						<th style="font-size:3vw"> ' . $titlu . ' </th>
					</tr>
					<tr>
						<th> Descriere </th>
						<td> ' . $descriere . ' </td>
					</tr>
					<tr>
						<th> Marime </th>
						<td> ' . $marime . '</td>
					</tr>
					<tr>
						<th> Data incarcare </th>
						<td> ' . $data_incarcare . ' </td>
					</tr>
				</table>
                </p>';
        ?>
    </div>

</body>

</html>