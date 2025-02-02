<?php
include("../PHP_Scripts/db_connect.php");

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
									<p style="font-style: italic;"> Perioada desfasurare: ' . $row['inceput'] . '-' . $row['final'] . ' </p>
								</div>
							</div>
						</a><br>';
	}
} else {
	echo '<div id="row">
			<p id="column" style="color:#cf3266;text-align:center">
				<strong>Eroare:</strong> Nu exista competitii deschise.
			</p>
		</div>';
}
?>