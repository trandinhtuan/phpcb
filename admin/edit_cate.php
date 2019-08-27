<?php
require("../includes/session.php");
$id = $_GET['cid'];
require("../includes/config.php");
if (isset($_POST['ok'])) {
	$t = $_POST['txttitle'];
	$sql = "update cate_news set cate_title='$t' where cate_id='$id'";
	mysqli_query($conn, $sql);
	header("location: list_cate.php");
	exit();
}
$sql = "select * from cate_news where cate_id='$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
?>
<form action="" method="post"> <!-- Hoặc action="edit_cate.php?cid=<?php echo $data[cate_id] ?>" điều này giúp mình lấy được cid để thực hiện update -->
	Categorie Name: <input type="text" name="txttitle" size="25" value="<?php echo $data[cate_title] ?>" required><br>
	<input type="submit" name="ok" value="Submit">
</form>