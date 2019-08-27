<?php
require("includes/config.php");
require_once("template/top.php");
require_once("template/left.php");
?>
        
        <div id="info">
            <?php
            $id = $_GET['cid'];
            $b = 4;
            if (isset($_GET[page])) {
                $c = $_GET[page];
            } else {
                 $sql = "select news_id, news_title, news_info, news_img from news where cate_id='$id' and news_check='Y' order by news_id DESC";
                $query = mysqli_query($conn, $sql);
                $a = mysqli_num_rows($query);
                $c = ceil($a/$b);
            }

            if (isset($_GET[start])) {
                $x = $_GET[start];
            } else {
                $x = 0;
            }
            $sql = "select news_id, news_title, news_info, news_img from news where cate_id='$id' and news_check='Y' order by news_id DESC limit $x,$b";
            $query = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($query)) {
                echo "<div class='news'>";
                echo "<h1>$data[news_title]</h1>";
                if ($data[news_img] != NULL) {
                    echo "<img src='data/$data[news_img]' width='130' align='left'>";
                }
                echo $data[news_info];
                echo "<p align='right'>...<a href='detail.php?nid=$data[news_id]'>Đọc tiếp</a></p>";
                echo "<div class='cls'></div>";
                echo "</div>";
            }

            if ($c>1) {
                $d = $x/$b+1;
                if ($d!=1) {
                    $y = $x-$b;
                    echo "<a href='categorie.php?cid=$id&start=$y&page=$c'>Trang trước</a>";
                }
                if ($d!=$c) {
                    $y = $x+$b;
                    echo "<div align='right'>";
                    echo "<a href='categorie.php?cid=$id&start=$y&page=$c'>Trang tiếp</a>";
                    echo "</div>";
                }
            }
            ?>
        </div>

<?php
require_once("template/bottom.php");
?>