<?php 
  session_start();
  include("conn.php");
  include("functions.php");
?> 

<?php
  $teachers="";
  $data=array();
    //get instructor by id
    if (isset($_SESSION['t_id'])) {
      $t_id = mysqli_real_escape_string($con,$_SESSION['t_id']); 

      $sql = "SELECT *FROM teachers WHERE t_id = $t_id"; 
      $result = mysqli_query ($con,$sql);

      //  echo "<h2>" . $result . "</h2>";
      $teachers = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
   
      //get latency by id
      $sql_pro = "SELECT *FROM programs WHERE t_id = $t_id";
      $result_pro = mysqli_query ($con,$sql_pro);
      $t_pro = mysqli_fetch_assoc($result_pro);
        mysqli_free_result($result_pro);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="with=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index-style.css">
  <title><?php echo $teachers['t_name'];?></title>
</head>
<body>
    
  <section class="wrapper">
    <nav>
      <div class="links">
        <ul>
          <li><a href="add_pro.php">add program</a></li>
          <li><a href="logout_user.php">Log Out</a></li>

        </ul>
      </div>
    </nav> 

    <div class="teacher">
      <div> 
        <?php
          if ($teachers):?>
            <p><strong><?php echo htmlspecialchars($teachers['t_name']);?></strong></p>
            <p><?php echo htmlspecialchars($teachers['position']);?></p>
       
        <?php
          else: ?>
            <h5>Not available</h5>
        <?php 
          endif ?>
      </div>
    </div>

  <div class="text-body">
    <div>
      <h2>البرامج التدريبيه</h2>
    <div class="programs">
      <ul>
        <li><p> </p>
          <ol>
            <?php
              $sql_pro = "SELECT *FROM programs WHERE t_id = $t_id ORDER BY pro_year DESC ";
              $result_pro= mysqli_query ($con,$sql_pro);
              $t_pro= mysqli_num_rows($result_pro) > 0 ;

              if ($t_pro){
                while($t_pro = mysqli_fetch_array($result_pro)){?>
                  <ul>
                    <strong>(<?php echo htmlspecialchars($t_pro['pro_year']);?>)</strong>
                    <li>(<?php echo htmlspecialchars($t_pro['pro_name']);?>)</li>
                    <li> المجال: <?php echo htmlspecialchars($t_pro['field']);?></li>
                    <li> نوعه: <?php echo htmlspecialchars($t_pro['type']);?> </li>
                    <li>  مدته: <?php echo htmlspecialchars($t_pro['timing']);?></li>
 
                    </li>
                  </ul>
          <?php }}?>
          </ol>
        </li>
      </ul>
    </div>
  </div>
</div>
</body>
</html>



<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Noticia+Text|Lalezar');

  :root{
    --padding: 21px;
    --bg-color: #f5f8eb;
    --text-color: black;
    --accent-color: #2c6fbb;
    --font-display: 'Lalezar';
    }

  html{
    margin: 0;
    padding: 0;
  }

  body{
    background-image: url("img/school.jfif");
    background-size: cover; 
    background-attachment: fixed;
  }

  .teacher {
    width: 240px;
    padding: var(--padding);
    color: var(--text-color);
    background: var(--bg-color);
    font-family: var(--font-family);
    line-height: 1.9;
    font-size: 19px;
    border-radius: 10px;
    text-align: center;
    float: left;
    margin-left: 40px;
  }

  .teacher a
  {
    font-style: oblique;
    font-size: 18px;
    color: darkred;
    font-weight: bold;
  }
  
  .teacher p{
    font-size: 20px;
  }

  .text-body{
    max-width: 1500px;
    padding: var(--padding);
    color: var(--text-color);
    background: var(--bg-color);
    line-height: 1.9;
    font-size: 19px;
    border-radius: 10px;
    float: center;
    margin-left: 330px;
    margin-right: 10px;
  }

  .text-body ul li{
    margin-left: 10px;
  }

  .text-body ol li {
    margin-left: 30px;
  }

  h2{
    font-size: 150%;
    transform: translateX(-5px);
    margin-bottom: 0;
  }

  a{
    color: var(--text-color);
  }

  .teacher strong{
    display: inline-block;
    transform: translateX(-5px);
    font-size: 110%;
    line-height: 1;
    color: black;
    font-weight: bold;
  }


  h2:after{
    content: '';
    display: block;
    height: 8px;
    background: var(--accent-color);
    max-width: 150px;
    transform: skewX(-21deg) translateY(-13px);
    border-radius: 3px;
  }

  .text-body  p{
    color:black ;
    font-weight: bold;
  }

  h2 a {
    text-decoration: none;
  }

  h2 a:hover{
    color: gray;
  }

  h4 {
    padding-top: 12px;
    font-size: 22px;
    color: darkgoldenrod;
  }
</style>