<?php 
  include("conn.php");
  include("functions.php");

  $t_id=$_GET['edit'];

  //read from database
  $query="select * from teachers where t_id=$t_id";
  $result=mysqli_query($con, $query);
  $row=mysqli_fetch_assoc($result);
  $t_id=$row['t_id'];
  $status=$row['status'];


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $status=$_POST['status'];

    $query = "update teachers set status='$status' where t_id=$t_id";
    $result=mysqli_query($con, $query);

    if($result)
    {
      //Data Updated Successfully  
      header('Location:admin.php');
    }
    else {
      die(mysqli_error($con));
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"><title>update</title>
  <link rel="stylesheet" href="index-style.css">
</head>
<body>

  <section class="wrapper">
    <nav>
      <a href="indexHome.php"><img src="img/KFULogo.png" ></a>
      <div class="links">
        <ul>
          <li><a href="admin.php">Home</a></li>
          <li><a href="logout_admin.php">Log Out</a></li>
        </ul>       
      </div>
    </nav> 

    <div class="jumbotron-1">
      <h1 class="text-center">update</h1>
    </div>

    <div class="container">
      <div class="col-md-6 offset-md-3 col-sm-12">
        <form method="POST" enctype="multipart/form-data">
           <div class="mb-3">
            <label class="form-label">State of Warning </label>
             <input type="name" name="status" autocomplete="off" class="form-control" value="<?php echo $status;?>" readonly="readonly">
          <select name="status" class="form-control" value="<?php echo $status;?>">
              <option  selected disabled>Select One</option>
              <option>None </option>
              <option>warning 1 </option>
              <option>warning 2 </option>
              <option>warning 3</option>
              <option>warning 4</option>
              <option>warning 5 </option>
              <option>warning 6 </option>
              <option>warning 7 </option>

            </select>
          </div>
  
          <button type="submit" name="edit" class="btn btn-primary">Edit</button>
          <button class="btn btn-secondary-1"><a href="admin.php">Cancel</a></button>
        </form>
      </div>
    </div>
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

