<?php
	session_start();
	include './../connect.php';
	header('Content-Type: text/html; charset=UTF-8');
	if(!isset($_SESSION['username'])) header("Location: https://2o1o2021.000webhostapp.com/login.php");
	$username = $_SESSION['username'];
	$sql = "INSERT INTO choigame2(name) VALUES ('$username'.'2')";
	mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Find</title>
	<style type="text/css">
		
		body{
			background-color: #ffd4e3;

		}
		#moveElement{
			position: absolute;
			height: 20px;
			width: 20px;
			/*background-color: white;*/
			z-index: 10;
		}
		#time{
			position: absolute;
			right: 40%;
		}
		audio{
			display: none;
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
		#passButton{
			position: relative;
			top: 20%;
			left: 650px;
			top: 240px;
			z-index: 10;
			cursor: pointer;
			display: none;
		}
		h2{
			position: absolute;
			display: none;
		}
		audio{display: none;}
		.hienra{
			position: absolute;
			z-index: 20;
			height: 700px;
			width: 1400px;
			display: none;
		}
		#moveElement{
			position: absolute;
			height: 20px;
			width: 20px;
			background-color: white;
			z-index: 10;
		}
	</style>
</head>
<body>
	<audio>
		<source src="./../y2meta.com - Clock Tick Tock Sound Effects (128 kbps).mp3" type="mp3/ogg">
	</audio>
	<div id="moveElement">
	
	</div>
	<!-- <img id="moveElement" src="./../tin.jpg"/> -->

	<audio controls>
		  <source src="./../JV4BSDN-claps.mp3" type="audio/ogg">
 	</audio>
 	<!-- <img class="hienra" src="./../hienra1.jpg">
 	<img class="hienra" src="./../hienra2.jpg">
 	<img class="hienra" src="./../hienra4.JPG">
 	<img class="hienra" src="./../hienra3.jpg"> -->
	<h1 id="time">0</h1>
	<h2><?php echo $_SESSION['username']?></h2>
	<div id="gameOverBoard">
		<img id="overAlert" src="./../switchgame.png">
		<p id="pass">Chúc mừng người chơi vượt qua màn 2, cũng ghê đó, chuẩn bị tinh thần cho màn cuối nhé, quà gần lắm rồi!!!</p>
		<img id="passButton" onclick="window.location = './../xucsacGame/xucsacGame.php'" src="./../continụe-button.png"/>
	</div>
	<!-- <script type="text/javascript" src="game2.js"></script> -->
	<script type="text/javascript">
		// drag element
		var elm = document.getElementById("moveElement");
		var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
		// w3school
		elm.addEventListener('mousedown',dragMouseDown);

		function dragMouseDown(e){
			e = e || window.event;
			e.preventDefault();
			pos3 = e.clientX;
			pos4 = e.clientY;
			document.onmouseup = closeDragElm;
			document.onmousemove = dragElm;
		}

		function dragElm(e){
			e = e || window.event;
			e.preventDefault();
			pos1 = pos3 - e.clientX;
			pos2 = pos4 - e.clientY;
			pos3 = e.clientX;
			pos4 = e.clientY;

			elm.style.top = (elm.offsetTop - pos2) + "px";
			elm.style.left = (elm.offsetLeft - pos1) + "px";
		}

		function closeDragElm(){
			document.onmouseup = null;
			document.onmousemove = null;
		}

		// 
	</script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="way22.js"></script>
	<script type="text/javascript" src="game22.js"></script>
</body>
</html>