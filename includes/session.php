<?php
session_start();
if ($_SESSION['ses_level'] != 2) {
	header("location: login.php");
	exit();
}
?>