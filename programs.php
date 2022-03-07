<?php
  session_start();
  include("conn.php");
  include("functions.php");

  $t_id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"><title> Programs</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <section class="header">
   <nav>
      <img src="img/school.jfif" >
      <div class="links">
        <ul>
          <li><a href="admin.php">Home</a></li>
          <li><a href="logout_admin.php">Log Out</a></li>
        </ul>       
      </div>
    </nav> 
  <div class="container">
  <div>

  <div class="type"><h2>  </h2></div>
  <div class="container">   
    <table class="table">
      <thead>
        <tr>
          <th scope="col">  مدته</th>
          <th scope="col">  نوعه</th>
          <th scope="col">  مجاله</th>
          <th scope="col">  اسم البرنامج التدريبي</th>
          <th scope="col"> السنة</th>
        </tr>
      </thead>
      <tbody>
   <?php 
          $query = "select * from programs where t_id=$t_id ORDER BY pro_year DESC" ; 
          $result=mysqli_query($con, $query);
      
          if($result){
            while($row=mysqli_fetch_assoc($result)){
              $t_id=$row['t_id'];
              $timing=$row['timing'];
              $type=$row['type'];
              $field=$row['field'];
              $pro_name=$row['pro_name'];           
              $pro_year=$row['pro_year'];

              echo '<tr>
                      <td>'.$timing.'</td>
                      <td>'.$type.'</td>
                      <td>'.$field.'</td>
                      <td>'.$pro_name.'</td>                      
                      <td>'.$pro_year.'</td>


                    </tr>';
            }
          }
        ?>  
      </tbody>
    </table>
  </div>
</div>
    </div>
  </div>
</body>
</html>

<style type="text/css">
  body{
  margin: 0;
  padding: 0;
  background-color:#e9ecef ;
  }

  nav{
  display: flex;
  padding: 2% 6%;
  justify-content: space-between;
  align-items: center;
  font-family: sans-serif;
  }

  nav img{
    width: 150px;
  }

  .links{
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
  .btn-danger-1:hover{color:#fff;
    background-color:#c82333;
    border-color:#bd2130
  }

  .type h2 {
    padding:0.2rem 0.2rem ;
    background-color: #D3D3D3;
    margin-bottom: 25px;
    text-align: center;
  }

  thead {
    margin-right: 50px;
  }
</style>