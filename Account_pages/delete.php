<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title> Account deletion </title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
		<?php include('../Elem_site/menu.php'); ?>
		<?php include('../Elem_site/logo.php'); ?>

        <div id="page_stack">
			<div id="row">
				<div id="column">
					<div>
						<h1> Account deletion </h1>
					</div>

					<?php
                        include("../PHP_Scripts/db_connect.php");
                        $query = 'delete from conturi where email = "'.$_SESSION['email'].'";';
                        
                        $delete = $db->query($query);

                        if (mysqli_affected_rows($db) > 0) {

                            $_SESSION = array();

                            if (ini_get("session.use_cookies")) {
                                $params = session_get_cookie_params();
                                setcookie(session_name(), '', time() - 42000,
                                    $params["path"], $params["domain"],
                                    $params["secure"], $params["httponly"]
                                );
                            }
                            session_destroy();

                            echo '<div id="row">
                                        <p id="column" style="text-align:center;">
                                            Your account was succesfully deleted. <br>
                                            Wish you all the best! <3 <br><br>
                                            <button class="small" id="edit" onclick="location.href=\'../index.php\'" type="button"> Return to main page </button>
                                        </p>
                                        <img id="right" src="../Images/website_img/welcome.jpeg">
                                    </div>';
                        } else {
                            echo "<!-- Mesaj de eroare -->
                                    <div id='row'>
                                        <p id='column' style='color:#cf3266;text-align:center'>
                                            <strong>Error:</strong> Couldn't delete your account. Try again later
                                        </p>
                                    </div>";
                        }
                    ?>
				</div>
            </div>
        </div>
		<?php include("../Elem_site/footer.php"); ?>
</body>

</html>