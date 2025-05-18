<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../PHP_Scripts/db_connect.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $participare = $_POST['ID_participare'];
    $jurat = $_POST['ID_jurat'];
    $competitie = $_POST['ID_competitie'];

    // Verificare daca mai exista o alta nota
    $query = 'select * from note_competitii
                where ID_jurat = "'. $jurat . '" 
                and ID_participare = ' . $participare . ';';
    $select = $db->query($query);
    $num = $select->num_rows;
    
    if($num == 0){       // Nu exista nicio alta nota => adaugam nota in tabel
        foreach($_POST['rating'] as $nota){
            $queryIn = 'insert into note_competitii
                        (ID_jurat, ID_participare, Nota) 
                        values 
                        ("' . $jurat . '", ' . $participare . ', ' . $nota . ');';
            $insert = $db->query($queryIn);

            if($insert){
                header("Location: competitions_individual.php?id=". $competitie);
            }
        }
     } else {           // Exista o nota => modificam nota initiala
        foreach($_POST['rating'] as $nota){
            $queryUp = 'update note_competitii
                        set Nota = ' . $nota . ' 
                        where ID_jurat = "'. $jurat . '" 
                        and ID_participare = ' . $participare . ';';
            $update = $db->query($queryUp);

            if($update){
                header("Location: competitions_individual.php?id=". $competitie);
            }
        }
     }
}
?>
