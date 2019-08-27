<?php
require("../includes/session.php");
require("../includes/config.php");
if (isset($_POST['ok'])) {
	$t = $_POST['txttitle'];
	$n = $_POST['txtinfo'];
	$sql = "insert into page(page_title, page_info) values('$t', '$n')";
	$query = mysqli_query($conn, $sql);
	header("location:list_page.php");
	exit();
}
?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<form action="" method="post">
	<table>
		<tr>
			<td>Tên trang</td>
			<td><input type="text" name="txttitle" size="45" required></td>
		</tr>
		<tr>
			<td>Nội dung</td>
			<td>
				<textarea name="txtinfo" cols="45" rows="8" required></textarea>
				<script>CKEDITOR.replace('txtinfo')</script>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="ok" value="Submit"></td>
		</tr>
	</table>
</form>