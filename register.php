<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	include('connect.php');
	if(isset($_POST['register'])){
		$usernameR = $_POST['usernameR'];
		$passwordR = $_POST['passwordR'];
		$passwordRR = $_POST['passwordRR'];
		if(strcmp($passwordR,$passwordRR) != 0){
			echo "Xác nhận mật khẩu không trùng nhau <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}
		$sql = "INSERT INTO users(username,password) VALUES ('$usernameR','$passwordR')";
		mysqli_query($conn,$sql);
		header('Location: login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hello!</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			background-color: rgba(210,149,199,255);
		}
		form{
			position: absolute;
			top: 30%;
			left: 40%;
			display: flex;
			flex-direction: column;
			color: white;
			font-family: 'Roboto', sans-serif;
		}
		form span{
		}
		form input{
			height: 40px;
			margin-top: 5px;
			margin-bottom: 5px;
			width: 250px;
			border: none;
			background-color: white;
		}
		form button{
			height: 40px;
			width: 150px;
			font-weight: 700;
			color: rgba(156,130,165,255);
			font-size: 15px;
			border: none;
			margin-top: 10px;
			background-color: white;
		}
		form h2{
			align-self:center;
		}
	</style>
</head>
<body>
	<form action="register.php" method="post">
		<h2>Đăng ký</h2>
		<input class="input" type="text" name="usernameR" placeholder="Tên đăng nhập..." />
		<span>Hãy cho mình biết tên thật,<br/> ở cuối sẽ có bất ngờ</span>
		<input class="input" type="password" name="passwordR" placeholder="Nhập mật khẩu bạn muốn" />
		<input class="input" type="password" name="passwordRR" placeholder="Nhập lại mật khẩu" />
		<button type="submit" name="register">Đăng ký</button>
	</form>
</body>
</html>