<?php 
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html>

<head>
	<title>ArtDraft</title>
	<link rel="stylesheet" href="websiteStyle.css">
</head>

<body>
			<!-- Bara de navigare -->
			<nav class="navbar">
				<ul class="navbar-list">
					<li class="nav-item">
						<a href="Main_pages/competitions.php"> Competitions </a>
					</li>

					<li class="nav-item">
						<a href="Main_pages/info.php"> Informations </a>
					</li>

					<li class="nav-item has-dropdown">
						<a href="#"> <img id="profile" src="Images/website_img/default_profile_pic.png"> Account </a>

						<?php
						if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
							// Meniu pentru utilizatori nelogati 
							echo '<ul class="dropdown">
							<li class="dropdown-item">
								<a href="Account_pages/register_page.php"> Register </a>
							</li>
							
							<li class="dropdown-item">
								<a href="Account_pages/login_page.php"> Login </a>
							</li>
						</ul>';
						} else if($_SESSION["rol"] == 0) {
							// Meniu pentru utilizatori logati cu rol de participant
							echo '<ul class="dropdown">
							<li class="dropdown-item">
								<a href="Account_pages/details.php"> Details </a>
							</li>
							
							<li class="dropdown-item">
								<a href="Account_pages/gallery.php"> Gallery </a>
							</li>
							
							<li class="dropdown-item">
								<a href="Account_pages/participations.php"> Participations </a>
							</li>
							
							<li class="dropdown-item logout">
								<a id="logout" href="Account_pages/logout.php"> Logout </a>
							</li>
						</ul>';
						} else {
							// Meniu pentru utilizatori logati cu rol de jurat
							echo '<ul class="dropdown">
							<li class="dropdown-item">
								<a href="Account_pages/details.php"> Details </a>
							</li>
							
							<li class="dropdown-item logout">
								<a id="logout" href="Account_pages/logout.php"> Logout </a>
							</li>
						</ul>';
						}

						?>
					</li>
				</ul>
			</nav>

	<div id="page_stack">
			<!-- Logo -->
			<div class="home">
				<h1 id="logo"><a href="index.php"> ArtDraft </a></h1>
				<h3 id="subtitle"> The place where artists compete </h3>
			</div>

			<!-- Continut pagina -->
			<div id="row">
				<img id="left" src="Images/website_img/Unicorn.jpg">
				<p id="column">
					Welcome to ArtDraft, the website that hosts art competitions so you can show and hone your art
					skills!
				</p>
			</div>
			<div id="row">
				<p id="column">
					Upload your art in your own gallery, sign it up for an ongoing competition, and get graded by a randomly selected jury!
				</p>
				<img id="right" src="Images/website_img/cat.jpg">
			</div>
		</div>
	<?php include('Elem_site/footer.php'); ?>
</body>

</html>
