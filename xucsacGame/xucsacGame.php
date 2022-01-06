<?php

	session_start();
	include('./../connect.php');
	header('Content-Type: text/html; charset=UTF-8');
	if(!isset($_SESSION['username'])) header("Location: https://2o1o2o21.000webhostapp.com/login.php");
	$username = $_SESSION['username'];
	$sql = "INSERT INTO choigame3(name) VALUES ('$username')";
	mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Xúc xắc</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			background-color: #ffd4e3;
		}
		#xucxac{
			height: 220px;
			width: 220px;
			position: absolute;
			right: 45%;
			top: 30%;
		}
		.rotate{
			animation-name: rotateDice;
			animation-iteration-count: 10;
			animation-duration: 0.1s;
			animation-fill-mode: forwards;
		}
		@keyframes rotateDice{
			from{
				transform: rotate(0deg);
			
			}
			to{
				transform: rotate(359deg);
				
			}
		}
		.faceOfDice{
			position: absolute;
			right: 45%;
			height: 200px;
			width : 200px;
			display: none;
			top: 30%;	
		}
		#chanButton{
			position: absolute;
			top: 30%;
			left: 20%;
			font-size :60px;
			color: black;
			font-family: Roboto;
			cursor: pointer;
		}
		#leButton{
			position: absolute;
			top: 30%;
			right: 20%;
			font-size :60px;
			color: red;
			font-family: Roboto;
			cursor: pointer;
		}
		.noneDice{
			display: none;
		}
		#note{
			position: absolute;
			width: 200px;
			font-family: Roboto;
		}
		label{
			position: absolute;
			bottom: 20%;
			right: 45%;
			font-size: 30px;
			font-weight: 700;
		}
		h6{
			display: none;

		}
		.noti{
			position: absolute;
			right: 45%;
			font-size: 30px;
			display: none;
		}
		#gameOverBoard{
			position: absolute;
			background: rgba(0, 0, 0, 0.5);
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
			right: ;
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
		audio{
			display: none;
		}
		#passMessage{
			position: absolute;
			z-index: 10;
			top: 20%;
			right: 37%;
			width: 400px;
			color: black;
			display: none;

		}
		textarea{
			position: relative;
			background-color: white;
			bottom: -100px;
			border: none solid;
			border-radius: 5px;
		}
		#passMessage button{
			position: relative;
			background-color: black;
			color: white;
			border: solid;
			border-radius: 5px;
			width: 60px;
			height: 40px;
			bottom: -85px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<audio controls>
		  <source src="./../JV4BSDN-claps.mp3" type="audio/ogg">
 	</audio>
 	<audio controls>
		  <source src="./../MANYDICE.wav" type="audio/ogg">
 	</audio>
	<img id="xucxac" src="./../xucxac.png">
	<img class="faceOfDice" src="./../mat1.png">
	<img class="faceOfDice" src="./../mat2.png">
	<img class="faceOfDice" src="./../mat3.png">
	<img class="faceOfDice" src="./../mat4.png">
	<img class="faceOfDice" src="./../mat5.png">
	<img class="faceOfDice" src="./../mat6.png">
	<h6><?php echo $_SESSION['username']?></h6>
	<div id="gameOverBoard">
		<img id="overAlert" src="./../switchgame.png">
		<div id="passMessage">
			<p id="pass">Dễ thế mà vẫn thắng được, trò chơi chẳng có gì ngoài tiền thưởng, mời bạn điền nhẹ STK vào đây:</p>
			<textarea id="stk"></textarea>
			<button id="earnButton">Lụm</button>
		</div>
		<p id="lose">Thua thật này, thử thách của bạn là: Nhắn tin cho một ai đó chúc mừng năm mới, cap màn hình và gửi vào facebook của tôi hehehe <a href="https://www.facebook.com/N%E1%BA%BFu-b%E1%BA%A1n-%C4%91%E1%BA%BFn-%C4%91%C3%A2y-%C4%91%E1%BB%83-n%E1%BB%99p-th%E1%BB%AD-th%C3%A1ch-103256728619828/">Facebook</a></p>
	</div>
	<h3 id="chanButton">Chẵn</h3>
	<h3 id="leButton">Lẻ</h3>
	<h3 class="noti">Đúng!<span class="notiScore"></span></h3>
	<h3 class="noti">Sai!<span class="notiScore"></span></h3>
	<h2 id="note">Chọn đúng thì cộng, chọn sai thì trừ, đủ 20 thì win, hết điểm thì...</h2>
	<label>Điểm của bạn: <span id="myScore">10</span></label>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src='game3.js'></script>
</body>
</html>