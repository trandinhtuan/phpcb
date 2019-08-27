<?php
require("../includes/session.php");
require("../includes/config.php");
$id = $_GET['pid'];
if (isset($_POST['ok'])) {
	$t = $_POST['txttitle'];
	$n = $_POST['txtinfo'];
	$sql = "update page set page_title='$t', page_info='$n' where page_id='$id'";
	$query = mysqli_query($conn, $sql);
	header("location:list_page.php");
	exit();
}

$sql = "select * from page where page_id='$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<form action="" method="post">
	<table>
		<tr>
			<td>Tên trang</td>
			<td><input type="text" name="txttitle" size="45" value="<?php echo $data[page_title] ?>" required></td>
		</tr>
		<tr>
			<td>Nội dung</td>
			<td>
				<textarea name="txtinfo" cols="45" rows="8" required><?php echo $data[page_info] ?></textarea>
				<script>CKEDITOR.replace('txtinfo')</script>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="ok" value="Submit"></td>
		</tr>
	</table>
</form>