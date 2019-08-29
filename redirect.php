<?php
function redirect_to($newLocation) {
	header("Location:" . $newLocation);
	exit;
}

?>