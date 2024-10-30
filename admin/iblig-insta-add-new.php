<?php

function IBLIG_insta_add_new()
{

	if (isset($_GET['pg']) && ! empty($_GET['pg'])) {
		$page = (string) $_GET['pg'];
		switch ($page) {
			case 'add':
			include 'views/gallery-edit.php';
			break;
			case 'edit':
			include 'views/gallery-edit.php';
			break;
			default:
			break;
		}
	} else {
		include 'views/gallery-edit.php';
	}
}
?>