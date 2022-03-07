<?php 
    session_start();
    include("connection.php");
    include("functions.php");
    include("header.php");
    require 'connection.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $inst_email = $_POST['inst_email'];
        $pass = $_POST['pass'];
        
        if(!empty($inst_email) && !empty($pass))
        {
            //read from database
            $query = "select * from instructor where inst_email = '$inst_email' limit 1";
            $result = mysqli_query($con, $query);
            var_dump($result);
            
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['pass'] === $pass)
                    {

                        $_SESSION['inst_id'] = $user_data['inst_id'];
                            header("Location:homeP.php");
                        die;
                    }
                }
            }
            
            header("Location:user-login-failed.php");
        }else
        {
          header("Location:user-login-failed.php");
        
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>KFU MIS Department</title>
    <link rel="stylesheet" href="index-style.css">
    <link rel="stylesheet" type="text/css" href="styleLogin.css">
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous">
    </script>
    <script>
        $(function(){
            $('#header').load('header.php');
        });
    </script>
</head>
<body>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Login failed!</strong> Invalid username / password.
    </div>
    <form method="POST">
        <div class="login-box">
            <img src="img/avatar.png" class="avatar">
            <h1> Log in </h1>
            <label> Email </label>
            <input type="text" name="inst_email" placeholder="email" required><br><br>

            <label> Password </label>
            <input type="password" name="pass" placeholder="Enter Password" required><br><br><br>

            <input type="submit" name="login" value="login">
        </div>
    </form>

</body>
</html>

<style type="text/css">
    body{
    background-image: url("img/KFU.png");
    background-size: cover; 
    background-attachment: fixed;
    padding: 0px;
    margin: 0px;
    }
    
    .alert {
      padding: 20px;
      background-color: #f44336;
      color: white;
      margin-top: 10px;
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