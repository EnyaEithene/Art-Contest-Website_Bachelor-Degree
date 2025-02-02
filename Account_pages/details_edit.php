<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Account details </title>
    <link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
    <?php include('../Elem_site/menu.php'); ?>

    <?php include('../Elem_site/logo.php'); ?>

    <?php include('../Elem_site/user_side_menu.php'); ?>

    <div class="main">
        <div id="row">
            <div id="column">
                <?php
                echo '<div id="form_stack">
                        <div style="text-align:center;">
                            <form action="details_update.php" method="post"> <br>';

                echo '<div class="form-group">
                                    <label for="nume">Nume</label><br>
                                    <input type="text" name="nume" value="' . $_SESSION['nume'] . '">
                                </div>';

                echo '<div class="form-group">
                                    <label for="prenume">Prenume</label><br>
                                    <input type="text" name="prenume" value="' . $_SESSION['prenume'] . '">
                                </div>';

                echo '<div class="form-group">
                                    <label for="autor">Email</label><br>
                                    <input type="text" name="email" value="' . $_SESSION['email'] . '">
                                </div>';

                echo '<div class="form-group">
                                    <label for="tel">Telefon</label><br>
                                    <input type="text" name="tel" value="' . $_SESSION['tel'] . '">
                                </div>';

                echo '<br>';
                echo ' <button class="small" id="edit" type="submit"> Edit </button>';

                echo '</form>
                    </div>
                </div>';
                ?>
            </div>
        </div>
    </div>

    <?php include('../Elem_site/footer.php'); ?>

</body>

</html>