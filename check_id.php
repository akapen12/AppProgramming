<meta charset="euc-kr">
<?php
    $id = $_GET['id'];
   if(!$id) 
   {
      echo("아이디를 입력하세요.");
   }
   else
   {
      error_reporting(E_ALL);

        ini_set('display_errors', '1');
        $host = 'localhost';
        $user = 'korea';
        $pw = '1234';
        $dbName = 'test';
        $mysqli = new mysqli($host, $user, $pw, $dbName);
 
      $sql = mq("select * from member where id='$id' ");

      //$result = mysqli_query($sql, $connect);
      $num_record = mysqli_num_rows($sql);

      if ($num_record)
      {
         echo "아이디가 중복됩니다!<br>";
         echo "다른 아이디를 사용하세요.<br>";
      }
      else
      {
         echo "사용가능한 아이디입니다.";
      }
   }
?>