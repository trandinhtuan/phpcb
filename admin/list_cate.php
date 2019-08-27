<?php
require("../includes/session.php");
?>
<link rel="stylesheet" href="style.css">
<script language="javascript">
	function xacnhan() {
		if (!window.confirm('Bạn có chắc là muốn xóa chuyên mục này không?')) {
			return false;
		}
	}
</script>
<table align="center" width="450">
	<tr>
		<th>STT</th>
		<th>Tên chuyên mục</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	require("../includes/config.php");
	$b = 3; // Số record trên 1 trang

	// Giảm số lượng câu truy vấn sẽ giúp ứng dụng chạy nhanh hơn
	// Với dòng code dưới câu truy vấn chỉ cần chạy 1 lần
	// Những lần chuyển trang sẽ không cần thực hiện lại câu truy vấn nữa
	if (isset($_GET['page'])) {
		$c = $_GET['page'];
	} else {
		$sql = "select * from cate_news";
		$query = mysqli_query($conn, $sql);
		$a = mysqli_num_rows($query); // Tổng số record
		$c = ceil($a/$b); // Tổng số trang
	}

	if (isset($_GET['start'])) {
		$x = $_GET['start']; // Vị trí bắt đầu của trang hiện hành
	} else {
		$x = 0; // Vị trí bắt đầu của trang hiện hành
	}
	$sql = "select * from cate_news limit $x, $b";
	$query = mysqli_query($conn, $sql);
	if (mysqli_num_rows($query) == 0) {
		echo "<tr>";
		echo "<td colspan='4'>Empty data</td>";
		echo "</tr>";
	} else {
		$stt = 0;
		while($data = mysqli_fetch_assoc($query)) {
			$stt++;
			echo "<tr>";
			echo "<td>$stt</td>";
			echo "<td>$data[cate_title]</td>";
			echo "<td><a href='edit_cate.php?cid=$data[cate_id]'>Sửa</a></td>";
			echo "<td><a href='del_cate.php?cid=$data[cate_id]' onclick='return xacnhan()'>Xóa</a></td>";
			echo "</tr>";
		}
	}
	?>
</table>
<div class="page" align="center">
	<?php
	if ($c > 1) {
		$d = $x/$b+1; // Vị trí hiện hành của trang
		if ($d != 1) {
			$y = $x-$b; // Vị trí bắt đầu của trang cần đi đến
			echo "<a href='list_cate.php?start=0&page=$c' class='link'>Trang đầu</a>";
			echo "<a href='list_cate.php?start=$y&page=$c' class='link'>Trang trước</a>";
		}
		$begin = $d-2;
		if ($begin < 1) {
			$begin = 1;
		}
		$end = $d+2;
		if ($end > $c) {
			$end = $c;
		}
		for ($i=$begin; $i <= $end ; $i++) { 
			if ($d == $i) {
				echo "<span class='active'>$i</span>";
			} else {
				$y = ($i-1)*$b; // Vị trí bắt đầu của trang cần đi đến
				echo "<a href='list_cate.php?start=$y&page=$c' class='link'>$i</a>";
			}
		}
		if ($d != $c) {
			$y = $x+$b; // Vị trí bắt đầu của trang cần đi đến
			echo "<a href='list_cate.php?start=$y&page=$c' class='link'>Trang sau</a>";
			$y = ($c-1)*$b; // Vị trí bắt đầu của trang cuối
			echo "<a href='list_cate.php?start=$y&page=$c' class='link'>Trang cuối</a>";
		}
	}
	?>
</div>