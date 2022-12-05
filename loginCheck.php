<?php

session_start();

$host = 'localhost';
$user = 'korea';
$pw = '1234';
$dbName = 'test';
$con = new mysqli($host, $user, $pw, $dbName);

$id = $_POST['id']; // 아이디
$pw = $_POST['pw']; // 패스워드

$query = "select * from member where member_id='$id' and member_pw_1='$pw'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$userid = $row['member_id'];
$userpw = $row['member_pw_1'];
$username = $row['member_name'];
$usernick = $row['member_nick'];
$userbirth = $row['member_birth'];
$useremail = $row['member_email'];
$userphone = $row['member_phone'];


if($id==$userid && $pw==$row['member_pw_1']){ // id와 pw가 맞다면 login

	echo "<script> alert('로그인 성공'); </script>";

   $_SESSION['id'] = $userid;
   $_SESSION['pw'] = $userpw;
   $_SESSION['name'] = $username;
   $_SESSION['nick'] = $usernick;
   $_SESSION['birth'] = $userbirth;
   $_SESSION['email'] = $useremail;
   $_SESSION['phone'] = $userphone; 

	echo "<script> location.href = 'index_main.php'; </script>";

}else{ // id 또는 pw가 다르다면 admin_login 폼으로

   echo "<script> alert('로그인 실패'); </script>";
   echo "<script> location.href = 'index.html'; </script>";

}

?>