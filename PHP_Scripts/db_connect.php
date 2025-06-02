<?php
@$db = new mysqli('localhost', 'webuser', 'webuser', 'competitii_arta');

if (mysqli_connect_errno()) {
    echo '<div id="row">
						<p id="column" style="color:#cf3266;">
							<strong>Erorr:</strong> Was not able to connect to server. Try again later.
						</p>
					</div>';
    exit;
}
?>