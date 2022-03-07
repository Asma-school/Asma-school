<?php
  session_start();
  include("conn.php");
  include("functions.php");
     ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Copatible" contet="IE=edge">
  <meta name="viewport" contet="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
  <title>Welcome, Admin!</title>
</head>
<body>

  <!-- start navbar -->
  <section class="wrapper">
    <nav>
      <img src="img/school.jfif" >
      <div class="links">
        <ul>
          <li><a href="logout_admin.php">Log out</a></li>
        </ul>
      </div>    
    </nav>
    <!-- end navbar -->

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col"> Name</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $query = "select * from teachers"; 
        $result=mysqli_query($con, $query);

        if($result){
          while($row=mysqli_fetch_assoc($result)){
            $t_id=$row['t_id'];
            $t_name=$row['t_name'];

           echo '<tr>
            <td> <a href="programs.php? id='.$t_id.'">'.$t_name.' </a> </td>
            </tr>';
          }
        }
        ?>   
      
      </tbody>
    </table>
  </div>
</body>
</html>

<style type="text/css">
  *{
    padding: 0px;
    margin: 0px;
  }

  body{
    background-color:#e9ecef ;
  }

  nav img{
    width: 150px;
  }

  .wrapper {
    background: url(../img/bg.jpg);
    width: 100%;
    height: 100vh;
  }

  nav {
    display: flex;
    padding: 2% 6%;
    justify-content: space-between;
    align-items: center;
    font-family: sans-serif;
  }

  .links {
    flex: 1;
    text-align: right;
  }

  .links li {
    display: inline-block;
    list-style: none;
    position: relative;
  }

  .links li a{
    display: inline-block;
    color: navy;
    padding-right: 15px;
    padding-left: 15px;
    padding-top: 15px;
    padding-bottom: 9px;
    text-decoration: none;
    font-size: 16px;
  }

  .links li:after{
    content: '';
    width: 0%;
    height: 1.5px;
    background: white;
    display: block;
    margin: auto;
    transition: 0.5s;
  } 

  .links ul li:hover:after{
    width: 100%;
  }

  .btn-secondary-1{
    color:#fff;
    background-color:#d9dad8;
    border-color:#a9a9a9
  }
    
  .btn-secondary-1:hover{
    color:#fff;
    background-color:#a9a9a9;
    border-color:#a9a9a9
  }

  .btn-danger-1{
    color:#fff;
    background-color:#e57373;
    border-color:#dc3545
  }
  .btn-danger-1:hover{
    color:#fff;
    background-color:#c82333;
    border-color:#bd2130}
</style>