<?php
include("../PHP_Scripts/db_connect.php");

// Pentru participanti
if($_SESSION['rol'] == 0){
	$query = 'select ID, nume, descriere, DATE_FORMAT(data_inceput,"%d.%m.%Y") AS inceput, DATE_FORMAT(data_final,"%d.%m.%Y") as final 
				from competitii 
				where data_inceput<=curdate() and data_final>=curdate()';
				
	$show = $db->query($query);
	$num_results = $show->num_rows;
				
	if ($num_results > 0) {
		for ($i = 0; $i < $num_results; $i++) {
			$row = $show->fetch_assoc();
				
			echo '<a href="../Competitions/competitions_individual.php?id=' . $row['ID'] . '">
						<div class="competition">
							<div class="object">
								<h3> ' . $row['nume'] . ' </h3>
									<p> ' . $row['descriere'] . ' </p>
									<p style="font-style: italic;"> Duration: ' . $row['inceput'] . '-' . $row['final'] . ' </p>
							</div>
						</div>
					</a><br>';
		}
	} else {
		echo '<div id="row">
				<p id="column" style="color:#cf3266;text-align:center">
					There are no ongoing contests.
				</p>
			</div>';
	}
	
} else if($_SESSION['rol'] == 1){
	$query0 = 'select ID_competitie from jurati_competitii where ID_jurat = "'. $_SESSION['ID'] .'";';

	$check = $db->query($query0);

	if($check->num_rows > 0){
		while($col = $check->fetch_assoc()){
			$query = 'select ID, nume, descriere, DATE_FORMAT(data_inceput,"%d.%m.%Y") AS inceput, DATE_FORMAT(data_final,"%d.%m.%Y") as final 
					from competitii 
					where data_final<=curdate() and ID = '. $col['ID_competitie'] .';';
			
			$show = $db->query($query);
			$num_results = $show->num_rows;
								
			if ($num_results > 0) {
				for ($i = 0; $i < $num_results; $i++) {
					$row = $show->fetch_assoc();
						
					echo '<a href="../Competitions/competitions_individual.php?id=' . $row['ID'] . '">
								<div class="competition">
									<div class="object">
										<h3> ' . $row['nume'] . ' </h3>
											<p> ' . $row['descriere'] . ' </p>
											<p style="font-style: italic;"> Duration: ' . $row['inceput'] . '-' . $row['final'] . ' </p>
									</div>
								</div>
							</a><br>';
				}	
			} else {
				echo '<div id="row">
						<p id="column" style="color:#cf3266;text-align:center">
							There are no contests to grade.
						</p>
					</div>';
			}	
		}
	} else {
		echo '<div id="row">
				<p id="column" style="color:#cf3266;text-align:center">
					There are no ongoing contests.
				</p>
			</div>';
	}
}
?>
