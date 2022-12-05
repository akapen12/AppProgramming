<html>
<!-- <meta charset="utf-8"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php

		session_start();

		$host = 'localhost';
		$user = 'korea';
		$pw = '1234';
		$dbName = 'test';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$apps_appid = $_POST['appid'];
	    $apps_name = $_POST['name'];
		$member_id = $_POST['userid'];


		$sql = "insert into my_list (
				apps_appid,
				apps_name,
				member_id
				
		)";
		
		$sql = $sql. "values (
				'$apps_appid',
				'$apps_name',
				'$member_id'
		)";

		if($mysqli->query($sql)){ 
		  echo '<script>alert("success inserting")</script>'; 
		}else{ 
		  echo '<script>alert("fail to insert sql")</script>';
		}

		mysqli_close($mysqli);
	  
	?>

<script>
	location.href = "index_main.php";
</script>

</html>