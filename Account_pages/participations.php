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
								$query = 'select * from participari where ID_participant="' . $_SESSION['ID'].'" order by ID desc;';

								$check = $db->query($query);
								$num_results = $check->num_rows;
								
								if ($num_results > 0) {
									while($col = $check->fetch_assoc()) {
										$query1 = 'select ID, nume, descriere, 
                                DATE_FORMAT(data_inceput,"%d.%m.%Y") AS inceput, 
                                DATE_FORMAT(data_final,"%d.%m.%Y") as final 
                              from competitii 
                              where ID='. $col['ID_competitie'].'
                              order by data_inceput desc;';
										$part = $db->query($query1);
                    $row = $part->fetch_assoc();

                    $notaFinala = is_null($col['Nota_finala']) ? "To Be Added" : $col['Nota_finala'];
      
										echo '<a href="../Competitions/competitions_individual.php?id=' . $row['ID'] . '">
															<div class="competition">
																<div class="object">
																	<h3> ' . $row['nume'] . ' </h3>
																	<p> ' . $row['descriere'] . ' </p>
																	<p style="font-style: italic;"> Duration: ' . $row['inceput'] . ' - ' . $row['final'] . ' </p>';
                    echo '<table><tr><th> Grade </th><td>';
                    if(is_null($col['Nota_finala'])){
                      echo 'To Be Added';
                    } else {
                      echo '<div class="rating" id="center">';
                      for ($i = 5; $i >= 1; $i--) {
                          $checked = ($col['Nota_finala'] == $i) ? 'checked' : '';
                          echo '<input class="star" id="rating-'. $col['ID'] .'" type="radio" name="rating-'. $col['ID'] .'" value="' . $i . '" ' . $checked . ' disabled>
                                <label for="rating"></label>';
                      }
                      echo '</div>'; 
                    }
                    echo '</td></tr>
                            <tr>
                              <th> Drawing </th>
                              <td> <a href="gallery_image.php?id=' . $col['ID_imagine'] . '"><img id="left" src="../Images/uploaded_img/' . $col['ID_participant'] . '_imagine_' . $col['ID_imagine'] . '.jpeg"><a> </td>
                            </tr>
                          </table></p>
                              </div>';
                    echo '';
										echo '</div>
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
