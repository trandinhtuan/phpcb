<?php
require("../includes/session.php");
?>
<link rel="stylesheet" href="style.css">
<script language="javascript">
	function xacnhan() {
		if (!window.confirm('Bạn có chắc là muốn xóa thành viên này không?')) {
			return false;
		}
	}
</script>
<table align="center" width="450">
	<tr>
		<th>STT</th>
		<th>Tài khoản</th>
		<th>Cấp bậc</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	require("../includes/config.php");
			$sql = "select * from user order by userid DESC";
			$query = mysqli_query($conn, $sql);
			if (mysqli_num_rows($query) == 0) {
				echo "<tr><td colspan='5'>Empty Data</td></tr>";
			} else {
				$stt = 0;
				while ($data = mysqli_fetch_assoc($query)) {
					$stt++;
					echo "<tr>";
					echo "<td>$stt</td>";
					echo "<td>$data[username]</td>";
					if ($data[level] == 1) {
						echo "<td>Thành viên</td>";
					} else {
						echo "<td><font color='red'>Quản trị</font></td>";
					}
					echo "<td><a href='edit_user.php?uid=$data[userid]'>Sửa</a></td>";
					echo "<td><a href='del_user.php?uid=$data[userid]' onclick='return xacnhan()'>Xóa</a></td>";
					echo "</tr>";
				}
			}
			
	?>
</table>