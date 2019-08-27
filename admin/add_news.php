<?php
require("../includes/session.php");
require("../includes/config.php");
if (isset($_POST['ok'])) {
	$uid = $_SESSION['ses_userid'];
	$ca = $_POST['cate'];
	$t = $_POST['txttitle'];
	$a = $_POST['txtauthor'];
	$i = $_POST['txtinfo'];
	$f = $_POST['txtfull'];
	$ch = $_POST['check'];
	if ($_FILES['img']['name'] != NULL) {
		$img = $_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], "../data/" . $img);
		$sql = "insert into news (news_title, news_author, news_info, news_full, news_check, news_img, userid, cate_id) values ('$t', '$a', '$i', '$f', '$ch', '$img', '$uid', '$ca')";
	} else {
		$sql = "insert into news (news_title, news_author, news_info, news_full, news_check, userid, cate_id) values ('$t', '$a', '$i', '$f', '$ch', '$uid', '$ca')";
	}
	mysqli_query($conn, $sql);
	header("location: list_news.php");
	exit();
}
?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Chuyên mục</td>
			<td>
				<select name="cate">
					<?php
					$sql = "select * from cate_news";
					$query = mysqli_query($conn, $sql);
					while ($data = mysqli_fetch_assoc($query)) {
						echo "<option value='$data[cate_id]'>$data[cate_title]</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tiêu đề</td>
			<td><input type="text" name="txttitle" size="35" required></td>
		</tr>
		<tr>
			<td>Tác giả</td>
			<td><input type="text" name="txtauthor" size="35" required></td>
		</tr>
		<tr>
			<td>Mô tả</td>
			<td><textarea name="txtinfo" cols="35" rows="5" required></textarea></td>
		</tr>
		<tr>
			<td>Chi tiết</td>
			<td><textarea name="txtfull" cols="35" rows="15" required></textarea></td>
		</tr>
		<script>CKEDITOR.replace('txtfull')</script>
		<tr>
			<td>Kiểm duyệt</td>
			<td>
				<input type="radio" name="check" value="Y">Yes
				<input type="radio" name="check" value="N" checked>No
			</td>
		</tr>
		<tr>
			<td>Hình ảnh</td>
			<td><input type="file" name="img" size="35"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="ok" value="Submit"></td>
		</tr>
	</table>
</form>