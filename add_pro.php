<?php 
  session_start();
  include("conn.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted 
    $pro_name=$_POST['pro_name'];
    $pro_year=$_POST['pro_year'];
    $type=$_POST['type'];
    $field=$_POST['field'];
    $timing=$_POST['timing'];


    if(!empty($pro_name) && !empty($pro_year) && !empty($type) && !empty($field) && !empty($timing))
    {
      $t=$_SESSION['t_id'];

      //if not empty, save to database
      $query = "insert into programs (pro_name, pro_year, type, field, timing,t_id) values ('$pro_name', '$pro_year','$type', '$field', '$timing','$t')";
      $result=mysqli_query($con, $query);
      
      if($result){
        //Data Inserted Successfully  
        header('Location:t_home.php');   
      }
    }
    else {
      //if empty, failed to Insert
      die(mysqli_error($con));
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="index-style.css">
  <title> Adding Programs</title>
</head>
<body>

  <!-- start navbar -->
  <section class="wrapper">
    <nav>
      <a href="indexHome.php"><img src="img/KFULogo.png" ></a>
      <div class="links">
        <ul>
          <li><a href="t_home.php">View Programs</a></li>
          <li><a href="logout_user.php">Log Out</a></li>
        </ul>       
      </div>
    </nav>
    <!-- end navbar -->

    <div class="jumbotron-1">
      <h1 class="text-center">Add Programs</h1>
    </div>

    <!-- start add project form-->
    <div class="container ">
      <div class="col-md-6 offset-md-3 col-sm-12">
        <form method="post">
          <div class="mb-3">
            <label class="form-label">اسم البرنامج التدريبي</label>
            <input type="text" name="pro_name" autocomplete="off" class="form-control"  placeholder="Enter Program Name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">السنة  </label>
            <select name="pro_year" class="form-control" required>
              <option  selected disabled>Select One</option>
              <option>1440</option>
              <option>1441</option>
              <option>1442</option>
              <option>1443</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">نوع البرنامج </label>
            <select name="type" class="form-control" required>
              <option  selected disabled>Select One</option>
              <option>عن بعد</option>
              <option>حضوري</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">مجال البرنامج </label>
            <select name="field" class="form-control" required>
              <option  selected disabled>Select One</option>
              <option>تربوي</option>
              <option>غير ذلك</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">مدة البرنامج </label>
            <input type="text" name="timing" class="form-control" placeholder="Enter Timing" required >
          </div>
          

          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          <button class="btn btn-secondary-1"><a href="t_home.php">Cancel</a></button>
        </form>
      </div>
    </div>
    <!-- end add project form-->


</body>
</html>
<style type="text/css">
  body{
    background-color:#e9ecef ;
  }
  .jumbotron-1{
    padding:0.5rem 0.5rem ;
    margin-bottom:1rem;
    background-color: #bab86c;
    border-radius:.3rem}

  .btn-secondary-1{
    color:#fff;
    background-color:#d9dad8;
    border-color:#a9a9a9}

  .btn-secondary-1:hover{
    color:#fff;
    background-color:#a9a9a9;
    border-color:#a9a9a9;}
</style>