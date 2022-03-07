<?php
session_start();
    
    include("conn.php");
    include("functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
<title></title>
<link rel="stylesheet" href="index-style.css">
<style type="text/css">
	body{
	background-image: url("img/school.jfif");
    background-size: cover; 
    background-attachment: fixed;
	}
</style>
</head>
<body>

	<section class="wrapper">
		<nav>
		<a href="home.php"><img src="img/school.jfif" ></a>
		<div class="links">
			<ul>
				<li><a href="home.php">Home</a></li>
                <li><a href="">Log In</a>
                    <ul class="dropdown">
                    	<li><a href="user_login.php">Teacher</a></li>
                      <li><a href="admin_login.php">Admin</a></li>
                    </ul>
                </li>
			</ul>
		</div>
	</nav>

</body>
</html>
<style type="text/css">

.text-box{
	width: 90%;
	color: wight;
	position: absolute;
	top: 44%;
	left: 50%;
	transform: translate(-50%, -50%);
	text-align: center;
	
}

.text-box h1{
	font-size: 55px;
}

.text-box p{
	margin: 10px 0 20px;
	font-size: 20px;
	color: navy;
	background: rgb(270, 270, 270,0.6);
	overflow: hidden;
	max-width: 1050px;
	margin: 20px auto;
	padding: 20px;
	border-radius: 10px;


}
.text-box{
	margin: 10px 0 40px;
	font-size: 14px;
	color: navy;
}

.row{
	margin-top: 18%;
	display: flex;
	justify-content: space-between;
}


.about-colume{
	flex-basis: 30%;
	background: rgb(270, 270, 270,0.6);
	border-radius: 10px;
	margin-bottom: 3%;
	margin-top: 3%;
	padding: 10px 10px;
	box-sizing: border-box;

}
h3{
	color: navy;
	text-align: center;
	}

	
/*about section*/

.about{
	width: 80%;
	margin: auto;
	text-align: center;
	padding-top: 0px;

}

h1{
	font-size: 36px;


}

p{
	color: navy;
	font-size: 14px;
	font-weight: 300;
	line-height: 22px;
	padding: 10px;

}

*{

  box-sizing: border-box;
}

.counter-up{
  background:  rgb(270, 270, 270,0.6);
  min-height: 30vh;
  background-size: cover;
  padding: 13px;
  position: relative;
  display: flex;
  align-items: center;
  border-radius: 10px;
}

.counter-up .content{
  z-index: 1;
  position: relative;
  display: flex;
  width: 100%;
  height: 100%;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;

}
.counter-up .content .box{
  border: 1px dashed navy;
  width: calc(25% - 30px);
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  flex-direction: column;
  padding: 20px;
}

.content .box .counter{
  font-size: 50px;
  font-weight: 500;
  color: navy;
  font-family: sans-serif;
}
.content .box .text{
  font-weight: 500;
  font-size: 20px;
  color: navy;
}
h1 {
	font-size: 42px;
	color: navy;
}


.contact{
		font-size: 15px;
		width: 510px;
		text-align: center;
	    background:rgb(270, 270, 270,0.6) ;
	margin-top: 100px;
	border-radius: 10px;
	}
	
	.contact h3{
		text-align:left;
		color: navy;
	}

	.contact img{
		height: 20px;
		margin: 0 14px;
	}
</style>
