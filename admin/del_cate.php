<?php
require("../includes/session.php");
$id = $_GET['cid'];
require("../includes/config.php");
$sql = "delete from cate_news where cate_id='$id'";
mysqli_query($conn, $sql);
header("location: list_cate.php");
exit();
?>