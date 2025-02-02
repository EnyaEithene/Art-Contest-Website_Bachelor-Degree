<?php
$sql = 'select * from arta_participanti where id_participant="' . $_SESSION['ID'] . '";';
$result = $db->query($sql);
$num_results = $result->num_rows;

if ($num_results != 0) {
    for ($i = 0; $i < $num_results; $i++) {
        $row = $result->fetch_assoc();
        //echo ;
        echo '<label for="img' . $row['id'] . '">
                <input type="radio" name="img[]" value=' . $row['id'] . '>
                <img style="height:auto;width:20%" class="gallery" src="../Images/uploaded_img/' . stripslashes($row['id_participant']) . '_imagine_' . stripslashes($row['id']) . '.jpeg"></img>
            </label><br>';
    }
} else {
    echo '<div> Nu aveti imagini in galerie. </div>';
}
?>