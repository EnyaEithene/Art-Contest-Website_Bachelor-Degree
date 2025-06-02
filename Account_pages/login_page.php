<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="../websiteStyle.css">
	</head>
	<body>
	
		<?php include('../Elem_site/menu.php'); ?>
		
		<?php include('../Elem_site/logo.php'); ?>
		
		<div id="form_stack">
			<div id="inline-div">
				<button id="gray"><a href="register_page.php">Register new account</a></button>
				<button id="purple"><a href="login_page.php">Log into account</a></button>
			</div>
			<div style="text-align:center;">
				<form action="login.php" method="POST">
					
					<div class="form-group">
						<label for="email"> E-mail </label>
						<input type="text" name="email">
						<span class="error">*</span>
					</div>
					
					<div class="form-group">
						<label for="pass"> Password </label>
						<input type="text" name="pass">
						<span class="error">*</span>
					</div>
					
					<p><span class="error">* required field</span></p>
					<button id="login" type="submit"> Login </button>
			</div>
			</form>
		</div>

		<?php include('../Elem_site/footer.php'); ?>
		
	</body>
</html>