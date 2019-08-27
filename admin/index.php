<?php
require("../includes/session.php");
?>

<link rel="stylesheet" href="style.css">

<table align="center" width="750">
	<tr>
		<th colspan="7">Chào bạn, <?php echo $_SESSION['ses_username']; ?></th>
	</tr>
	<tr>
		<td><a href="add_cate.php">Thêm chuyên mục</a></td>
		<td><a href="list_cate.php">Quản lý chuyên mục</a></td>
		<td><a href="add_news.php">Thêm tin tức</a></td>
		<td><a href="list_news.php">Quản lý tin tức</a></td>
		<td><a href="add_user.php">Thêm thành viên</a></td>
		<td><a href="list_user.php">Quản lý thành viên</a></td>
	</tr>
	<tr>
		<td colspan="2"><a href="add_page.php">Thêm trang</a></td>
		<td colspan="2"><a href="list_page.php">Quản lý trang</a></td>
		<td colspan="2"><a href="logout.php">Đăng xuất</a></td>
	</tr>
</table>
