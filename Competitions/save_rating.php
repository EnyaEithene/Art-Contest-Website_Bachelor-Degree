<?php
include("../PHP_Scripts/db_connect.php");

// Citire request JSON
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['rating'])) {
    // Pregatire SQL
    $stmt = $db->prepare('INSERT INTO juriu (ID_competitie, ID_imagine, ID_Jurat, Nota) 
                      VALUES (?, ?, ?, ?)');
    $stmt->bind_param('iiis', $ID_competitie, $ID_imagine, $ID_Jurat, $Nota);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Rating-ul a fost salvat cu succes!']);
    } else {
        echo json_encode(['message' => 'Rating-ul nu a fost salvat.']);
    }

    $stmt->close();
} else {
    echo json_encode(['message' => 'Niciun rating dat.']);
}
?>