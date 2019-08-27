<?php
session_start();
if (isset($_POST['ok'])) {
	$u = $_POST['txtuser'];
	$p = md5($_POST['txtpass']);
	require("../includes/config.php");
	$sql = "select * from user where username='$u' and password='$p'";
	$query = mysqli_query($conn, $sql);
	if (mysqli_num_rows($query) == 0) {
		echo "Tên truy cập và mật khẩu không chính xác. Vui lòng nhập lại.";
	}
	else {
		$data = mysqli_fetch_assoc($query);
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		$_SESSION['ses_username'] = $data['username'];
		$_SESSION['ses_level'] = $data['level'];
		$_SESSION['ses_userid'] = $data['userid'];
		header("location: index.php");
		exit();
	}
}
?>

<form action="login.php" method="post">
	Username: <input type="text" name="txtuser" size="25" required><br>
	Password: <input type="password" name="txtpass" size="25" required><br>
	<input type="submit" value="Login" name="ok">
</form>
