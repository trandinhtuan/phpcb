<?php
require("../includes/session.php");
?>
<link rel="stylesheet" href="style.css">
<script language="javascript">
	function xacnhan() {
		if (!window.confirm('Bạn có chắc là muốn xóa tin tức này không?')) {
			return false;
		}
	}
</script>
<table align="center" width="450">
	<tr>
		<th>STT</th>
		<th>Tiêu đề</th>
		<th>Thư mục</th>
		<th>Username</th>
		<th>Check</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	require("../includes/config.php");
	$sql = "select news_id, news_title, cate_title, username, news_check from news as n, cate_news as cn, user as u where n.cate_id = cn.cate_id and u.userid = n.userid  order by news_id DESC";
	$query = mysqli_query($conn, $sql);
	if (mysqli_num_rows($query) == 0) {
		echo "<tr><td colspan='7'>Chưa có dữ liệu</td></tr>";
	} else {
		$stt = 0;
		while ($data = mysqli_fetch_assoc($query)) {
			$stt++;
			echo "<tr>";
			echo "<td>$stt</td>";
			echo "<td>$data[news_title]</td>";
			echo "<td>$data[cate_title]</td>";
			echo "<td>$data[username]</td>";
			if ($data[news_check] == "Y") {
				echo "<td>Duyệt</td>";
			} else {
				echo "<td><font color='red'>Chưa duyệt</font></td>";
			}
			echo "<td><a href='edit_news.php?nid=$data[news_id]'>Sửa</a></td>";
			echo "<td><a href='del_news.php?nid=$data[news_id]' onclick='return xacnhan()'>Xóa</a></td>";
			echo "</tr>";
		}
	}
	?>
</table>