<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Stergere din Galerie </title>
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
                        <h1> Stergere din Galerie </h1>
                    </div>

                    <!-- Continut pagina -->
                    <div id="form_stack"></div>
                    <form action="delete_image.php?id=<?php echo $ID; ?>" method="POST">
                        <?php
                        include("show_images.php");
                        ?>
                        <button id="login" type="submit">Sterge</button>
                    </form>

                </div>
            </div>

        </div>
        <?php include("../Elem_site/footer.php"); ?>
    </div>
</body>

</html>