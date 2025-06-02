<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
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

	<div id="page_stack">
	<div class="main">
		<div id="row">
			<div id="column">
				<div>
					<h1> Details </h1>
				</div>
				<table>
					<tr>
						<th> First Name </th>
						<td> <?php echo $_SESSION['prenume'] ?> </td>
					</tr>
					<tr>
						<th> Last Name </th>
						<td> <?php echo $_SESSION['nume'] ?> </td>
					</tr>
					<tr>
						<th> E-mail </th>
						<td> <?php echo $_SESSION['email'] ?> </td>
					</tr>
					<tr>
						<th> Phone number </th>
						<td> <?php echo $_SESSION['tel'] ?> </td>
					</tr>
				</table>
				<button class="small" id="edit" onclick="location.href='details_edit.php'" type="button"> Edit </button>

				<div>
					<button id="logout" class="small" onclick="location.href='logout.php'" type="button"> Logout </button>
				</div>

				<div>
					<button id="logout" class="small" onclick="location.href='deleteAccount.php'" type="button"> Delete Account </button>
				</div>
			</div>
		</div>
	</div>
	</div>

	<?php include('../Elem_site/footer.php'); ?>

</body>

</html>