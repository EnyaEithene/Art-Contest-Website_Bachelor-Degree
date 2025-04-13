<?php session_start();
include("../PHP_Scripts/db_connect.php");
// Variabila extrase din link 
$ID = $_GET['ID'];

// Extragere date competitie din baza de date 
$query = 'select nume 
            from competitii 
            where ID=' . $ID;
$result = $db->query($query);

$row = $result->fetch_assoc();
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
                        <h1> <?php echo $row['nume']; ?> </h1>
                    </div>

                    <!-- Continut pagina -->
                    <div id="form_stack"></div>
                    <form action="inscriere.php?id=<?php echo $ID; ?>" method="POST">
                        <?php
                        include("show_images.php");
                        ?>
                        <button id="login" type="submit">Inscrie-te</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php include("../Elem_site/footer.php"); ?>
    </div>
</body>

</html>