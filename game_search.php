<?php

   session_start();
   error_reporting( E_ALL );
   ini_set( "display_errors", 1 );

    $host = 'localhost';
    $user = 'korea';
    $pw = '1234';
    $dbName = 'test';
    $search_con = $_GET['search'];
    $con = new mysqli($host, $user, $pw, $dbName);
    $query =  "select * from game_list where apps_name= '". $search_con ."' order by apps_appid desc";
    $result = mysqli_query($con, $query);
    while($gamelist = $result->fetch_array()){
    $appid = $gamelist["apps_appid"];
    

    if($appid == null){
        echo "<script> alert('검색하신 게임이 존재하지 않습니다.'); </script>";
    }
    else {
      echo "<script> location.href = 'steamapi2.php?id=".$appid."'; </script>";
    }
   }
?>