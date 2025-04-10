<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" href="../websiteStyle.css">
</head>

<body>
			<!-- elemente comune -->
			<?php include('../Elem_site/menu.php'); ?>

			<?php include('../Elem_site/logo.php'); ?>

			<!-- Formular -->
			<div id="form_stack">
				<div id="inline-div">
					<button id="purple"><a href="register_page.php">Register new account</a></button>
					<button id="gray"><a href="login_page.php">Log into account</a></button>
				</div>
				<div style="text-align:center;">
					<form action="register.php" method="POST">

						<div class="form-group">
							<label for="prenume"> First Name </label>
							<input type="text" name="prenume">
							<span class="error">*</span>
						</div>

						<div class="form-group">
							<label for="nume"> Last Name </label>
							<input type="text" name="nume">
							<span class="error">*</span>
						</div>

						<div class="form-group">
							<label for="email"> E-mail </label>
							<input type="text" name="email">
							<span class="error">*</span>
						</div>

						<div class="form-group">
							<label for="tel"> Phone Number </label>
							<input type="text" name="tel">
							<span class="error"> </span>
						</div>

						<div class="form-group">
							<label for="pass"> Password </label>
							<input type="text" name="pass">
							<span class="error">*</span>
						</div>

						<div class="form-group">
							<label for="confirmPass"> Confirm password </label>
							<input type="text" name="confirmPass">
							<span class="error">*</span>
						</div>

						<p><span class="error">* required field</span></p>
						<button id="login" type="submit">Register</button>
					</form>
				</div>
			</div>
		<?php include('../Elem_site/footer.php'); ?>
</body>

</html>