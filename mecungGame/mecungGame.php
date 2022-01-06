<?php
	session_start();
	include './../connect.php';
	header('Content-Type: text/html; charset=UTF-8');
	if(!isset($_SESSION['username'])) header("Location: https://2o1o2021.000webhostapp.com/login.php");
	$username = $_SESSION['username'];
	$sql = "INSERT INTO choigame2(name) VALUES ('$username')";
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
			background-color: white;
			z-index: 10;
		}
		#time{
			position: absolute;
			right: 40%;
		}
		#arrow{
			position: absolute;
			height: 200px;
			width: 200px;
			transform: rotate(190deg);
		}
		h4{
			position: absolute;
			top: 100px;
			left: 100px;
		}
		audio{display: none;}
	</style>
</head>
<body>
	<audio>
		<source src="./../y2meta.com - Clock Tick Tock Sound Effects (128 kbps).mp3" type="mp3/ogg">
	</audio>
	<div id="moveElement">
	
	</div>
	<!-- <img id="moveElement" src="./../tin.jpg"/> -->
	<h1 id="time">0</h1>
	<img id="arrow" src="./../white-arrow.png">
	<h4>Kéo nó!</h4>
	<!-- <script type="text/javascript" src="game2.js"></script> -->
	<script type="text/javascript">
		// drag element
		var elm = document.getElementById("moveElement");
		var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;

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
	<script type="text/javascript" src="way21.js"></script>
	<script type="text/javascript" src="game21.js"></script>
</body>
</html>