<?php
require("../includes/session.php");
if (isset($_POST['ok'])) {
	$c = $_POST['txtcate'];
	require("../includes/config.php");
	$sql = "insert into cate_news(cate_title) values('$c')";
	mysqli_query($conn, $sql);
	header("location: list_cate.php");
	exit();
}
?>

<form action="add_cate.php" method="post">
	Categorie Name: <input type="text" name="txtcate" size="25" required>
	<input type="submit" name="ok" value="Submit">
</form>