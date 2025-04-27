<?php
	session_start();
	include("../PHP_Scripts/db_connect.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Participations </title>
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
							<h1> Participations </h1>
						</div>
							<?php
								$query = 'select * from participari where ID_participant="' . $_SESSION['ID'].'";';

								$check = $db->query($query);
								$num_results = $check->num_rows;
								
								if ($num_results > 0) {
									while($col = $check->fetch_assoc()) {
										$query1 = 'select ID, nume, descriere, 
															DATE_FORMAT(data_inceput,"%d.%m.%Y") AS inceput, 
															DATE_FORMAT(data_final,"%d.%m.%Y") as final 
													from competitii where ID='. $col['ID_competitie'];
										$part = $db->query($query1);
										$row = $part->fetch_assoc();

										echo '<a href="../Competitions/competitions_individual.php?id=' . $row['ID'] . '">
															<div class="competition">
																<div class="object">
																	<h3> ' . $row['nume'] . ' </h3>
																	<p> ' . $row['descriere'] . ' </p>
																	<p style="font-style: italic;"> Duration: ' . $row['inceput'] . ' - ' . $row['final'] . ' </p>
																</div>
															</div>
														</a><br>';
										}
								} else {
									echo "<div>Here you'll see at what competitions you signed up.</div>";
								}
							?>
					</div>
				</div>
			</div>
		</div>
	<?php include('../Elem_site/footer.php'); ?>
	</body>
</html>