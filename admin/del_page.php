<?php
require("../includes/session.php");
$id = $_GET['pid'];
require("../includes/config.php");
$sql = "delete from page where page_id='$id'";
mysqli_query($conn, $sql);
header("location: list_page.php");
exit();
?>