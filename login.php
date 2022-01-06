<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	if(isset($_SESSION['username'])) header("Location: index.php");
	include('connect.php');
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$sql1 = "SELECT username FROM users WHERE username='$username'";
		$query = mysqli_query($conn,$sql1);
		if (mysqli_num_rows($query) != 0) {
			echo "Tên đăng nhập này đã tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}
		$sql2 = "INSERT INTO users(username,password) VALUES ('$username','123456')";
		mysqli_query($conn,$sql2);
		$_SESSION['username'] = $username;
		header('Location: index.php?username='.$username);
		die();
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
			align-self: center;
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

		}
		form h2{
			align-self:center;
		}
		form span{
			width: 300px;
		}
		span a{
			color: white;
		}
	</style>
</head>
<body>
	<form action="login.php" method="post">
		<h2>Đăng nhập</h2>
		<span>Hề hề hề hề</span>
		<input class="input" type="text" name="username" placeholder="Tên đăng nhập..." />
		<!-- <input class="input" type="password" name="password" placeholder="Mật khẩu..." /> -->
		<button type="submit" name="login">Đăng nhập</button>
		<span>Hãy cho tôi biết tên có thể gọi đc ^^, ở cuối sẽ có bất nhờ </span>
	</form>
</body>
</html>