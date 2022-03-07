<?php 
    session_start();
    include("conn.php");
    include("functions.php");
    include("header.php");
    require 'conn.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $t_name = $_POST['t_name'];
        
        if(!empty($t_name))
        {  
            //read from database
            $query = "select * from teachers where t_name = '$t_name' limit 1";
            
            $result = mysqli_query($con, $query);
            var_dump($result);
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['t_name'] === $t_name)
                    {

                        $_SESSION['t_id'] = $user_data['t_id'];
                            header("Location:t_home.php");
                        die;
                    }
                }
            }
            
        
            header("Location:login_fail.php");
        }else
        {
            header("Location:login_fail.php");
        
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title></title>
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
    <form method="POST">
        <div class="login-box">
            <img src="img/avatar.png" class="avatar">

            <h1> Log in </h1>
            <label>Name </label>
            <input type="text" name="t_name" placeholder="name" required><br><br>

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