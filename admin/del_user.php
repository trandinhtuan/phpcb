<?php
require("../includes/session.php");
$id = $_GET['uid'];
if ($id == 1 || $id == $_SESSION['ses_userid']) {
	echo "<script>";
	echo "alert('Bạn không thể xóa admin và chính mình.'); window.location='list_user.php'";
	echo "</script>";
} else {
	require("../includes/config.php");
	$sql = "delete from user where userid='$id'";
	mysqli_query($conn, $sql);
	header("location: list_user.php");
	exit();
}
?>