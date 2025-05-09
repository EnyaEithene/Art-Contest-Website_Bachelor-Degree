<?php session_start();
include("../PHP_Scripts/db_connect.php");
// Variabila extrase din link 
$ID = $_GET['id'];

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
    <title> Sign up </title>
    <link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
    <div class="page_stack">
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
                            <button id="login" type="submit">Sign up</button>
                        </form>
                        <?php
                        echo '<button id="purple" class="small" type="button"><a href="competitions_individual.php?id=' . $ID . '">Return to the competition</a></button>';
                        ?>
                </div>
            </div>

    </div>
    <?php include("../Elem_site/footer.php"); ?>
</body>

</html>