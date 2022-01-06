<?php
	include './../connect.php';
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	if(!isset($_SESSION['username'])) header("Location: https://2o1o2021.000webhostapp.com/login.php");
	$username = $_SESSION['username'];
	$sql = "INSERT INTO choigame1(name) VALUES ('$username')";
	mysqli_query($conn,$sql);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Flick Flick Flick!</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			background-color: #ffd4e3;
		}
		.score{
			position: absolute;
			width: 100px;
			height: 20px;
		}
		.rowScore{
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			align-items: center;
		}
		#huongdan{
			color: black;
			font-family: 'Roboto', sans-serif;
			position: absolute;
			font-size :20px;
			top: 400px;
			left: 20px;
			width: 150px;
		}
		#gameOverBoard{
			position: absolute;
			background-color: black;
			opacity: 0.7;
			z-index: 10;
			width: 100%;
			height: 100%;
			display: none;
		}
		#overAlert{
			position: absolute;
			top: 10%;
			right: 35%;
			height: 300px;
			width: 500px;
			z-index: 10;
		}
		#pass{
			position: absolute;
			z-index: 10;
			top: 20%;
			right: 37%;
			font-family: 'Roboto', sans-serif;
			font-size: 20px;
			width: 400px;
			color: black;
			display: none;
		}
		#lose{
			position: absolute;
			z-index: 10;
			top: 20%;
			right: 37%;
			font-family: 'Roboto', sans-serif;
			font-size: 20px;
			width: 400px;
			color: black;
			display: none;
		}
		#passButton{
			position: relative;
			top: 20%;
			left: 650px;
			top: 240px;
			z-index: 10;
			cursor: pointer;
			display: none;
		}
		#loseButton{
			position: relative;
			top: 20%;
			left: 650px;
			top: 240px;
			z-index: 10;
			cursor: pointer;
			display: none;	
		}
		h1{
			position: absolute;
			top: 550px;
		}
		audio{
			display: none;
		}
	</style>
</head>
<body>
	<div id="main">
		<audio controls>
		  	<source src="./../2FCRR7Z-menu-click.mp3" type="audio/ogg">
		</audio>
		<audio>
			<source src="./../JV4BSDN-claps.mp3" type="audio/ogg">
		</audio>
		<audio id="tiengcuoi">
			<source src="./../tiengcuoi (mp3cut.net).mp3" type="audio/ogg">
		</audio>
		<h1><?php echo $_SESSION['username']?></h1>
		<div id="gameOverBoard">
			<img id="overAlert" src="./../switchgame.png">
			<p id="lose">Hề hề hề có người về trước rồi liuliu, chơi lại từ đầu!</p>
			<p id="pass">Chúc mừng người chơi đã vượt qua màn 1, màn dễ nhất,	 tôi chơi khoảng 1p là qua, xin mời người chơi bước qua màn 2</p>
			<img id="passButton" onclick="window.location = './../mecungGame/mecungGame.php'" src="./../continụe-button.png"/>
			<img id="loseButton" onclick="window.location = './../index.php'" src="./../continụe-button.png"/>
		</div>
		<div class="score">
			<div class="rowScore">
				<div id="xanh" style="background-color: #191dff; height: 20px; width: 20px;"></div>
				<!-- <img id="giang" src="./../giang.jpg" style=" height: 60px; width: 60px;"> -->
				<h2 id="scoreXanh">0</h2>
			</div>
			<div class="rowScore">
				<div id="do" style="background-color: red; height: 20px; width: 20px;"></div>
				<!-- <img id="van" src="./../Van.jpg" style=" height: 60px; width: 60px;"> -->
				<h2 id="scoreDo">0</h2>
			</div>
			<div class="rowScore">
				<!-- <img id="lien" src="./../Lien.jpg" style=" height: 60px; width: 60px;"> -->
				<div id="tim" style="background-color: purple; height: 20px; width: 20px;"></div>
				<h2 id="scoreTim">0</h2>
			</div>
			<div class="rowScore">
				<!-- <img id="dieu" src="./../Dieu.jpg" style=" height: 60px; width: 60px;"> -->
				<div id="vang" style="background-color: yellow; height: 20px; width: 20px;"></div>
				<h2 id="scoreVang">0</h2>
			</div>
			<div class="rowScore">
				<!-- <img id="hao" src="./../hao.jpg" style=" height: 60px; width: 60px;"> -->
				<div id="den" style="background-color: black; height: 20px; width: 20px;"></div>
				<h2 id="scoreDen">0</h2>
			</div>
		</div>
		<p id="huongdan">
			Click ô vuông, tất cả đến 5 thì thắng, đến 5 mà chưa thắng chọn tiếp sẽ trừ 1
		</p>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="food.js"></script>
	<script type="text/javascript" src='game1.js'></script>
</body>
</html>