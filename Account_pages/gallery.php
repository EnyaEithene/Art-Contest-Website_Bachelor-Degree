<?php session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include("../PHP_Scripts/db_connect.php"); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>

<head>
	<title> User's Gallery </title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
	<?php include('../Elem_site/menu.php'); ?>

	<?php include('../Elem_site/logo.php'); ?>

	<?php include('../Elem_site/user_side_menu.php'); ?>

	<div id="page_stack">
    <div class="main">
      <div id="row">
        <div id="column">
          <div>
            <h1> Gallery </h1>
          </div>

          <fieldset>
            <legend>Upload art</legend>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <input type="file" name="fisier" id="fisier">

              <div class="form-group">
                <label for="titlu"> Title </label>
                <input type="text" name="titlu">
                <span>*</span>
              </div>

              <div class="form-group">
                <label for="desc"> Description </label>
                <textarea name="desc" rows="4" cols="50"></textarea>
              </div>

              <p><span>* required field</span></p>
              <button id="upload" class="small" type="submit"> Upload </button>
            </form>
          </fieldset> <br>

          <!--
          <fieldset>
            <legend> Aranjare galerie</legend>
            <form action="gallery_edit.php" method="post">

            </form>
          </fieldset>
          -->

          <div>
            <h1> Uploaded images </h1>
            <?php
            $sql = 'select * from arta_participanti where ID_participant="' . $_SESSION['ID'] . '";';
            $result = $db->query($sql);
            $num_results = $result->num_rows;

            if ($num_results != 0) {
              for ($i = 0; $i < $num_results; $i++) {
                $row = $result->fetch_assoc();
                //echo ;
                echo '<a href="gallery_image.php?id=' . $row['ID'] . '">
                    <img class="gallery" src="../Images/uploaded_img/' . stripslashes($row['ID_participant']) . '_imagine_' . stripslashes($row['ID']) . '.jpeg"></img>
                  </a><br><br>';
              }
            } else {
              echo "<div> You haven't uploaded any images yet </div>";
            }
            ?>
          </div>

        </div>
      </div>
    </div>
  </div>
	<?php include('../Elem_site/footer.php'); ?>

</body>

</html>
