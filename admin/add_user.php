<?php
require("../includes/session.php");
if (isset($_POST['ok'])) {
	if ($_POST['txtpass'] != $_POST['txtpass2']) {
		echo "Vui lòng xác nhận đúng mật khẩu.";
	} else {
		$u = $_POST['txtuser'];
		$p = md5($_POST['txtpass']);
		$l = $_POST['level'];
		require("../includes/config.php");
		$sql = "select * from user where username='$u'";
		$query = mysqli_query($conn, $sql);
		if (mysqli_num_rows($query) == 1) {
			echo "Tài khoản đã tồn tại, vui lòng chọn tài khoản khác.";
		} else {
			$sql = "insert into user(username, password, level) values('$u', '$p', '$l')";
			mysqli_query($conn, $sql);
			header("location: list_user.php");
			exit();
		}
	}
}
?>

<form action="" method="post">
	Cấp bậc: <select name="level">
		<option value="1">Thành viên</option>
		<option value="2">Quản trị</option>
	</select><br>
	Tài khoản: <input type="text" name="txtuser" size="25" required><br>
	Mật khẩu: <input type="password" name="txtpass" size="25" required><br>
	Nhập lại MK: <input type="password" name="txtpass2" size="25" required><br>
	<input type="submit" name="ok", value="Xác nhận">
</form>