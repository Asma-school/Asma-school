<?php 
	session_start();
	include("conn.php");
	include("functions.php");

	if (isset($_SESSION['id'])){
		header('location:admin.php');
	}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$admin_id = $_POST['admin_id'];
		$pass = $_POST['pass'];

		if(!empty($admin_id) && !empty($pass))
		{
			//read from database
			$query = "select * from admin where admin_id = '$admin_id' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass'] === $pass)
					{
						//if the data matches, Successfully logged in 
						$_SESSION['id'] = $user_data['id'];
						header("Location:admin.php");
						die;
					}
				}
			}
			
?>
	<!-- not matches, failed logged in --> 
	<div class="alert">
  	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  	<strong>Login failed!</strong> Invalid username / password.
	</div> <?php
		}
		else
		{ 
	?><div class="alert">
  		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  		<strong>Login failed!</strong> Invalid username / password.
		</div><?php
		
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="styleLogin.css">
<link rel="stylesheet" href="index-style.css">

  <!-- start navbar -->
	<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"> </script>
  <script>
  	$(function(){
  		$('#header').load('header.php');
  	});
  </script>
  <!-- end navbar -->

</head>
<body>
	<div id="header"></div>
	<form method="POST">
		<div class="login-box">
			<img src="img/avatar.png" class="avatar" >

			<h1> Log in </h1>
			<label> Admin ID </label>
			<input type="text" name="admin_id" placeholder="id"required><br><br>

			<label> Password </label>
			<input type="password" name="pass" placeholder="Enter Password"required><br><br><br>
		
			<input type="submit" name="login" value="login">
		</div>
	</form>

</body>
</html>
<style type="text/css">
	.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
	}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
	}

.closebtn:hover {
  color: black;
	}
</style>