<?php
	include 'connect.php';
	session_start();
	if(!isset($_SESSION['username'])) header("Location: login.php");
	$sql = "SELECT * FROM user";
	$query = mysqli_query($conn,$sql);
	// unset($_SESSION["username"]);
?>


<!DOCTYPE html>
<html>
<head>
	<title>xúc sắc</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			background-color: #ffd4e3;
		}
		h1{
			position: absolute;
			right: 45%;
		}
		.gift-container{
			animation-name: slide;
			animation-duration: 2s;
			animation-iteration-count: 1;
			animation-fill-mode: forwards;
			position: absolute;
			right: 50%;
			cursor: pointer;
			z-index: 1;
		}
		.gift-home-img{
			animation-name: rotation;
			animation-duration: 2s;
			animation-iteration-count: 1;
			animation-fill-mode: forwards;
		}

		@keyframes rotation{
			from { transform: rotate(0deg); 
				width: 0px; 
			}
			to{
				transform: rotate(359deg);
				width: 350px;
			}
		}
		@keyframes slide{
			from{
				top: 0%;
			}
			to{
				top: 50%;
			}
		}
		.gift-home-text{
			position: absolute;
			top: 50%;
			right: 45%;
		}
		#gift-home-message{
			display: none;
			position: absolute;
			top: -320px;
			left: -200px; 
			width: 550px;
			z-index: 10;
		}
		#message-img{
			height: 500px;
			width: 600px;
		}
		.message-text{
			display: none;
			position: absolute;
			top: 100px;
			left: 80px;
			font-family: 'Roboto', sans-serif;
			font-size: 25px;
			/*top: 0%;*/
		}
		.message-continue{
			position: absolute;
			top: 300px;
			right: 20px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h1>Hello, <?php echo $_SESSION['username']?></h1>
	<a href="logout.php">Đăng xuất</a>
	<div  class="gift-container">
		<img onclick="message_up()" class="gift-home-img" src="gift.png"/>
		<h2 class="gift-home-text">Quà</h2>
		<div id="gift-home-message">
			<img id="message-img" src="text-box.png">
			<p class="message-text">Hề hề hề quà mô mà ăn ngon rứa được, chào mừng các người chơi đã đến với Trò Chơi Ngon Cực, các người chơi buộc phải đi qua hết các trò chơi của chương trình để nhận phần thưởng!</p>
			<p class="message-text">Trong quá trình chơi có thể sẽ có người về đích trước, các bạn sẽ phải chơi lại, đừng lo, lúc ấy quà của bạn sẽ tăng lên</p>
			<p class="message-text">Ở màn 3 nếu bạn hết điểm thì bạn thua, mong lúc đó bạn sẽ thực hiện thử thách của tôi hehe</p>
			<p class="message-text">Chúc người chơi bách thắng!</p>
			<img onclick="step_message()" class="message-continue" src="continụe-button.png"/>
		</div>
	</div>
	<script type="text/javascript">
		var message_home = document.getElementsByClassName('message-text');
		var index = 1;
		function message_up(){
			document.getElementById('gift-home-message').style.display = 'block';
			message_home[0].style.display = "block";
		}
		function step_message(){
			message_home[index-1].style.display = 'none';
			message_home[index].style.display = "block";
			index++;
			if(index > 3) setTimeout(function(){document.location = "flickGame/flickGame.php";},2000);
		}
	</script>
</body>
</html>