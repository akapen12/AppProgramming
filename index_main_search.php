<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->



<html>
	<?php	
      session_start();

	  $host = 'localhost';
      $user = 'korea';
      $pw = '1234';
      $dbName = 'test';
      $con = new mysqli($host, $user, $pw, $dbName);
   ?>

	<head>
		<title>Steam Game Finder</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script type="text/javascript" src="js/session.js"></script>


	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Steam Game Finder</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index_main.php">홈</a></li>
							<li><a href="mypage.php">마이 페이지</a></li>
							<li><a href="index_main_genre.php">장르 별 게임</a></li>
							<li><a href="index_main_free.php">무료 게임</a></li>
							<li><a href="index_main_year.php">올해 출시된 게임</a></li>
							<li><a href="index_main_sale.php">할인 중인 게임</a></li>
							<li><a href="index_main_search.php">게임 검색</a></li>
							<li><h3>팔로우 중인 게임<h3></li>
							<?php
								$host = 'localhost';
                                $user = 'korea';
                                $pw = '1234';
                                $dbName = 'test';
                                $con = new mysqli($host, $user, $pw, $dbName);

                                $query = "select * from my_list where member_id='".$_SESSION['id']."'";

                                $result = mysqli_query($con, $query);
                                while($gamelist = $result->fetch_array()){
                                    $appid = $gamelist["apps_appid"];
                                    $gamename = $gamelist["apps_name"];
                                    echo '<li><a href = "steamapi2.php?id='.$appid.'">' . $gamename . '</a></li>';
                                }
                            ?>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							
							<h2>스팀 게임 검색</h2>

							<header>
								<div id="area">
										<form action="game_search.php" method="get" enctype="multipart/form-data">
											<input type="text" name="search" id="search" placeholder="search">
											<button type="submit"> 검색 </button>
										</form>
								</div>
							</header>
						</div>
					</div>

					

				<!-- Footer -->
				<footer id="footer">
						<div div width: 100%, text-align: center class="inner" display:inline-block class="container-login100-form-btn">
							<button type="button" class="login100-form-btn" onClick="location.href='index_main_genre.php'">여러 장르 게임</button>
							<button type="button" class="login100-form-btn" onClick="location.href='index_main_sale.php'">할인 중인 게임 </button>
							<button type="button" class="login100-form-btn" onClick="index_main_year.php'">올해 출시 게임 </button>
							<button type="button" class="login100-form-btn" onClick="location.href='index_main_free.php'">무료 출시 게임</button>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>