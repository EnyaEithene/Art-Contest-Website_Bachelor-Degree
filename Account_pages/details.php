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
				<div>
					<h1> Details </h1>
				</div>
				<table>
					<tr>
						<th> Nume </th>
						<td> <?php echo $_SESSION['nume'] ?> </td>
					</tr>
					<tr>
						<th> Prenume </th>
						<td> <?php echo $_SESSION['prenume'] ?> </td>
					</tr>
					<tr>
						<th> Email </th>
						<td> <?php echo $_SESSION['email'] ?> </td>
					</tr>
					<tr>
						<th> Telefon </th>
						<td> <?php echo $_SESSION['tel'] ?> </td>
					</tr>
				</table>
				<button class="small" id="edit" onclick="location.href='details_edit.php'" type="button"> Edit </button>

				<div>
					<button id="logout" class="small" onclick="location.href='logout.php'" type="button"> Logout
					</button>
				</div>
			</div>
		</div>
	</div>

	<?php include('../Elem_site/footer.php'); ?>

</body>

</html>