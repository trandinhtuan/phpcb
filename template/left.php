    <div id="main">
    	<div id="left">
        	<h1>Trang Chủ</h1>
            <ul>
            	<li><a href="index.php">Trang Chủ</a></li>
            	<li><a href="#">Giới Thiệu</a></li>
            	<li><a href="#">Dịch Vụ</a></li>
                <li><a href="#">Hỗ Trợ</a></li>  
            	<li><a href="#">Khách Hàng</a></li>
            	<li><a href="#">Liên Hệ</a></li>                                                              
            </ul>
        	<h1>Chuyên Mục</h1>
            <ul>
            <?php
				$sql="select * from cate_news";
				$query=mysqli_query($conn, $sql);
				if(mysqli_num_rows($query) == 0){
					echo "<li><a href='#'>Chưa có dữ liệu</a></li>";
				} else {
					while($data=mysqli_fetch_assoc($query)){
						echo "<li><a href='categorie.php?cid=$data[cate_id]'>$data[cate_title]</a></li>";
					}
				}
			?>
                                                        
            </ul>            
        </div>