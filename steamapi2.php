<?php

	session_start();
	
	$appid = $_GET['id'];
	$appurl = 'https://store.steampowered.com/api/appdetails?appids='.$appid.'&l=korean';
	$content = file_get_contents($appurl) ; // retrieve the JSON data string from the website
	$data = json_decode($content, true); // convert the JSON string into PHP array 
	$row = $data[$appid]["data"];
	$appimg = $row["header_image"];
	$gamename = $row['name'];
	$genre = $row["genres"][0]["description"];
	$price = $row["price_overview"]["final_formatted"];
	$free = $row["is_free"];
	$discount = $row["price_overview"]["discount_percent"];
	$release_date = $row["release_date"]["date"];
?>
<html>
<head>
	
</head>
<body>
	<p>게임명 :<?php echo $gamename;?></p>
	<p><img src = "<?php echo $appimg;?>"></p>
	<p>장르 : <?php echo $genre;?></p>
	<p>가격 : 
		<?php
			if($free == true){
				echo '<h3> 0₩ </h3>';;
			}
			else if($sub_free == true){
				echo '<h3> 0₩ </h3>';;
			}
			else if(!$price) {
				echo '<h3> 0₩ </h3>';;
			}
			else {
				echo '<h3>' . $price . '</h3>';;
			}
		?>
	</p>
	<p>할인 :
		<?php		
			if($discount == null){
				echo '<h3> 0% </h3>';;
			}else {
				echo '<h3>' .$discount. '%' .  '</h3>';;
			}
		?>
	</p>
	<p>출시일 : <?php echo $release_date;?></p>

	<?php
        $host = 'localhost';
        $user = 'korea';
        $pw = '1234';
        $dbName = 'test';
        $con = new mysqli($host, $user, $pw, $dbName);

        $query = "select * from my_list where member_id='".$_SESSION['id']."'";
        $result = mysqli_query($con, $query);
        $row2 = mysqli_fetch_array($result);
        $dataid = $row2['member_id'];
		if($dataid == null){
			?>
				<form action="insert_bookmark.php" method="post">
				<input type="hidden" id="appid" name="appid" value="<?php echo $appid;?>">
				<input type="hidden" id="name" name="name" value="<?php echo $gamename;?>">
				<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['id'];?>">
				<button type="submit">팔로우</button>
				<button type="button" onClick="location.href='index_main.php'">홈으로</button>
				</form>
			<?php
		}
        else if(strpos($_SESSION['id'], $dataid)){
        ?>


        <form action="" method="post">
        <input type="hidden" id="appid" name="appid" value="<?php echo $appid;?>">
        <input type="hidden" id="name" name="name" value="<?php echo $gamename;?>">
        <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['id'];?>">
        <button type="submit">언팔로우</button>
        </form>
        <?php
        }
        else{?>
            <form action="insert_bookmark.php" method="post">
            <input type="hidden" id="appid" name="appid" value="<?php echo $appid;?>">
            <input type="hidden" id="name" name="name" value="<?php echo $gamename;?>">
            <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['id'];?>">
            <button type="submit">팔로우</button>
			<button type="button" onClick="location.href='index_main.php'">홈으로</button>
            </form>
        <?php
        }
    ?>

</body>
</html>