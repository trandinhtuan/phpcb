<?php
require("../includes/session.php");
?>
<link rel="stylesheet" href="style.css">
<script language="javascript">
	function xacnhan() {
		if (!window.confirm('Bạn có chắc là muốn xóa trang này không?')) {
			return false;
		}
	}
</script>
<table align="center" width="450">
	<tr>
		<th>STT</th>
		<th>Tên trang</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	require("../includes/config.php");
			$sql = "select * from page order by page_id DESC";
			$query = mysqli_query($conn, $sql);
			if (mysqli_num_rows($query) == 0) {
				echo "<tr><td colspan='4'>Empty Data</td></tr>";
			} else {
				$stt = 0;
				while ($data = mysqli_fetch_assoc($query)) {
					$stt++;
					echo "<tr>";
					echo "<td>$stt</td>";
					echo "<td>$data[page_title]</td>";
					echo "<td><a href='edit_page.php?pid=$data[page_id]'>Sửa</a></td>";
					echo "<td><a href='del_page.php?pid=$data[page_id]' onclick='return xacnhan()'>Xóa</a></td>";
					echo "</tr>";
				}
			}
			
	?>
</table>