<div class="sidenav">
	<h1> Account </h1>
	<a href="../Account_pages/details.php"> Details </a>
	<?php
		if($_SESSION["rol"] == 0) {
			// Meniu pentru utilizatori logati cu rol de participant
			echo '<a href="../Account_pages/gallery.php"> Gallery </a>
				  <a href="../Account_pages/participations.php"> Participations </a>';
		} 
	?>
</div>