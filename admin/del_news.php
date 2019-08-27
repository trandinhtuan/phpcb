<?php
require("../includes/session.php");
$id = $_GET['nid'];
require("../includes/config.php");
$sql = "delete from news where news_id = '$id'";
mysqli_query($conn, $sql);
header("location: list_news.php");
exit();
?>