<?php
@$db = new mysqli('localhost', 'webuser', 'webuser', 'competitii_arta');

if (mysqli_connect_errno()) {
    echo '<div id="row">
						<p id="column" style="color:#cf3266;">
							Eroare: Conexiunea la serverul mysql nu s-a facut. Incercati mai tarziu.
						</p>
					</div>';
    exit;
}
?>