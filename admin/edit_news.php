<?php
require("../includes/session.php");
require("../includes/config.php");
$id = $_GET['nid'];
if (isset($_POST['ok'])) {
	$ca = $_POST['cate'];
	$t = $_POST['txttitle'];
	$a = $_POST['txtauthor'];
	$i = $_POST['txtinfo'];
	$f = $_POST['txtfull'];
	$ch = $_POST['check'];
	if ($_FILES['img']['name'] != NULL) {
		$img = $_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], "../data/" . $img);
		$sql = "update news set news_title='$t', news_author='$a', news_info='$i', news_full='$f', news_check='$ch', news_img='$img', cate_id='$ca' where news_id='$id'";
	} else {
		$sql = "update news set news_title='$t', news_author='$a', news_info='$i', news_full='$f', news_check='$ch', cate_id='$ca' where news_id='$id'";
	}
	mysqli_query($conn, $sql);
	header("location: list_news.php");
	exit();
}
$sql = "select * from news where news_id = '$id'";
$query = mysqli_query($conn, $sql);
$data2 = mysqli_fetch_assoc($query);
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
						if ($data2[cate_id] == $data[cate_id]) {
							echo "<option value='$data[cate_id]' selected>$data[cate_title]</option>";
						} else {
						echo "<option value='$data[cate_id]'>$data[cate_title]</option>";
						}
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tiêu đề</td>
			<td><input type="text" name="txttitle" size="35" value="<?php echo $data2[news_title] ?>" required></td>
		</tr>
		<tr>
			<td>Tác giả</td>
			<td><input type="text" name="txtauthor" size="35" value="<?php echo $data2[news_author] ?>" required></td>
		</tr>
		<tr>
			<td>Mô tả</td>
			<td><textarea name="txtinfo" cols="35" rows="5" required><?php echo $data2[news_info] ?></textarea></td>
		</tr>
		<tr>
			<td>Chi tiết</td>
			<td>
				<textarea name="txtfull" cols="35" rows="15" required><?php echo $data2[news_full] ?></textarea>
				<script>CKEDITOR.replace('txtfull')</script>
			</td>
		</tr>
		<tr>
			<td>Kiểm duyệt</td>
			<td>
				<input type="radio" name="check" value="Y" <?php if($data2[news_check]=='Y') echo 'checked' ?>>Yes
				<input type="radio" name="check" value="N" <?php if($data2[news_check]=='N') echo 'checked' ?>>No
			</td>
		</tr>
		<?php 
		if ($data2[news_img] != NULL) {
			echo "<tr>";
			echo "<td>Hình ảnh</td>";
			echo "<td><img src='../data/$data2[news_img]' width='150'></td>";
			echo "</tr>";
		}
		?>
		<tr>
			<td>Thay ảnh</td>
			<td><input type="file" name="img" size="35"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="ok" value="Submit"></td>
		</tr>
	</table>
</form>