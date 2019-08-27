<?php
require("../includes/session.php");
$id = $_GET['uid'];
require("../includes/config.php");

if (isset($_POST['ok'])) {
	if ($_POST['txtpass'] != $_POST['txtpass2']) {
		echo "Vui lòng xác nhận đúng mật khẩu.";
	} else {
		if ($id == 1 && $_SESSION['ses_userid'] != 1) {
			echo "<script>";
			echo "alert('Mày không thể làm vậy. Cút đi...'); window.location='list_user.php'";
			echo "</script>";
			exit();
		}
		$u = $_POST['txtuser'];
		$sql = "select * from user where username='$u' and userid!='$id'";
		$query = mysqli_query($conn, $sql);
		if (mysqli_num_rows($query) == 1) {
			echo "Tên tài khoản đã tồn tại, vui lòng chọn tên khác.";
		} else {
			$l = $_POST['level'];
			if ($_POST['txtpass'] == NULL) {
				$sql = "update user set username='$u', level='$l' where userid='$id'";
			} else {
				$p = md5($_POST['txtpass']);
				$sql = "update user set username='$u', password='$p', level='$l' where userid='$id'";
			}
			mysqli_query($conn, $sql);
			header("location: list_user.php");
			exit();
		}
	}
}

$sql = "select * from user where userid='$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
?>

<form action="" method="post">
	Cấp bậc: <select name="level">
		<option value="1" <?php if ($data[level] == 1) echo "selected" ?>>Thành viên</option>
		<option value="2" <?php if ($data[level] == 2) echo "selected" ?>>Quản trị</option>
	</select><br>
	Tài khoản: <input type="text" name="txtuser" size="25" value="<?php echo $data[username]; ?>" required><br>
	Mật khẩu mới: <input type="password" name="txtpass" size="25"><br>
	Nhập lại MKM: <input type="password" name="txtpass2" size="25"><br>
	<input type="submit" name="ok" value="Xác nhận">
</form>