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

		<style>
            .steamlib{
				list-style: none;
				width : 100%;
				text-align:center;
				margin : 0 auto; padding : 0;
                border: 1px solid lightgray;
                border-radius: 5px;
                background-color: rgb(247, 244, 222);
				
            }
			.steamlib img{
				width:80%;
			}
        </style>

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
							<li><a href="generic.html">장르 별 게임</a></li>
							<li><a href="generic.html">할인 중인 게임</a></li>
							<li><a href="elements.html">최근 출시 게임</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							
							<h2>스팀 모든 게임</h2>

							<header>
								<div id="area">
									<ul style = "width: 100%;">
										<?php
											$query = "select * from my_list";
											$result = mysqli_query($con, $query);
											while($gamelist = $result->fetch_array())
											{
												$appid = $gamelist["apps_appid"];
												$gamename = $gamelist["apps_name"];
												$appurl = 'https://store.steampowered.com/api/appdetails?appids='.$appid.'&l=korean';
												$content = file_get_contents($appurl) ; // retrieve the JSON data string from the website
												$data = json_decode($content, true); // convert the JSON string into PHP array 
												$row = $data[$appid]["data"];
												$appimg = $row["header_image"];
												$type = $row["type"];
												$genre = $row["genres"][0]["description"];
												$price = $row["price_overview"]["final_formatted"];
												$free = $row["is_free"];
												$release_date = $row["release_date"]["date"];

												echo '<li class = "steamlib"><a href = "steamapi2.php?id='.$appid.'">' . $gamename . '</a>';;
												echo '<h4>' . $genre . '</h6>';;
												echo '<a href = "steamapi2.php?id='.$appid.'"><img src=' . $appimg . '></a>';;
												echo '<h6>'. $release_date . '</h6>';;
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

												if($discount == null){
													echo '<h3>0%</h3> </li>';;
												}
												else {
													echo '<h3>' . $discount . '%</h3></li>';;
												}
											} 
										?>
									</ul>
								</div>
							</header>
						</div>
					</div>

					

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>
										<div class="field half">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
										<div class="field">
											<textarea name="message" id="message" placeholder="Message"></textarea>
										</div>
									</div>
								</form>
							</section>
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
									<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
									<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
									<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
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