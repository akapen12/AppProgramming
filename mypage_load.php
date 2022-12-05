<html>
<!-- <meta charset="utf-8"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<?php

		$host = 'localhost';
		$user = 'korea';
		$pw = '1234';
		$dbName = 'test';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$member_id = $_POST['id'];
	    $member_pw_1 = $_POST['pw_1'];
	    $member_name = $_POST['name'];
		$member_nick = $_POST['nick'];
		$member_birth = $_POST['birth'];
		$member_email = $_POST['email'];
		$member_phone = $_POST['phone'];


		$sql = "insert into member (
				member_id,
				member_pw_1,
				member_name,
				member_nick,
				member_birth,
				member_email,
				member_phone
		)";
		
		$sql = $sql. "values (
			'$member_id',
			'$member_pw_1',
			'$member_name',
			'$member_nick',
			'$member_birth',
			'$member_email',
			'$member_phone'
		)";

		if($mysqli->query($sql)){ 
		  echo '<script>alert("success inserting")</script>'; 
		}else{ 
		  echo '<script>alert("fail to insert sql")</script>';
		}

		mysqli_close($mysqli);
	  
	?>

<script>
	location.href = "sign_up_end.html";
</script>

</html>