<nav class="navbar">
	<ul class="navbar-list">
		<li class="nav-item">
			<a href="../Main_pages/competitions.php"> Competitions </a>
		</li>

		<li class="nav-item">
			<a href="../Main_pages/info.php"> Informations </a>
		</li>

		<li class="nav-item has-dropdown">
			<a href="#"> <img id="profile" src="../Images/website_img/default_profile_pic.png"> Account </a>

			<?php
			if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
				// Meniu pentru utilizatori nelogati 
				echo '<ul class="dropdown">
							<li class="dropdown-item">
								<a href="../Account_pages/register_page.php"> Register </a>
							</li>
							
							<li class="dropdown-item">
								<a href="../Account_pages/login_page.php"> Login </a>
							</li>
						</ul>';
			} else {
				// Meniu pentru utilizatori logati 
				echo '<ul class="dropdown">
							<li class="dropdown-item">
								<a href="../Account_pages/details.php"> Details </a>
							</li>
							
							<li class="dropdown-item">
								<a href="../Account_pages/gallery.php"> Gallery </a>
							</li>
							
							<li class="dropdown-item">
								<a href="../Account_pages/participations.php"> Participations </a>
							</li>
							
							<li class="dropdown-item logout">
								<a id="logout" href="../Account_pages/logout.php"> Logout </a>
							</li>
						</ul>';
			}

			?>
		</li>
	</ul>
</nav>