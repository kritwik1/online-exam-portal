<?php
session_start();
if( isset( $_SESSION['u2'] ) ){
}
else{
  header("location:loginuser.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Home</title>
    <style>
    .center{
      text-align: center;
  border: 4px solid green;
  padding: 10px;
    }
    </style>





</div>
    <ul class="nav nav-pills nav-fill">

  <li class="nav-item">
      <div class="shadow p-3 mb-5 bg-white rounded">

    <a class="nav-link " href="homepage.php" ><b>welcome User</b> <?php echo $_SESSION['u2'];?></a>
  </li>
</div>
</div>

  <!-- <li class="nav-item">
      <div class="shadow p-3 mb-5 bg-white rounded">
    <a class="nav-link " href="products.php">Products</a>
  </li>
</div> -->

  <li class="nav-item">
    <div class="shadow p-3 mb-5 bg-white rounded">
    <a class="nav-link" href="detail.php">Your Details</a>
  </li>
</div>

  <!-- <li class="nav-item">
      <div class="shadow p-3 mb-5 bg-white rounded">
    <a class="nav-link" href="myorder.php">Your Orders</a>
  </li>
</div> -->

  <li class="nav-item">
    <div class="shadow p-3 mb-5 bg-white rounded">
    <a class="nav-link " href="logout.php" >logout</a>
  </li>
</div>
</ul>

<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">


  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">Online Examination Portal</h1>
  </div>
</header>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";
$count=0;
$id=$_SESSION['u2'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password, uid,start_id,stop_id FROM user where username='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc() ) {
       if($row["start_id"]==1 && $row["stop_id"]==0){
         echo '<div class="center"><a class="btn btn-primary" href="startest.php">start test</a> </div>';

         $_SESSION["u2"] = $row["username"];

         // echo "connected";
       } else{
         echo "You've been blocked!";
       }
     }
   }
      ?>
  </body>
</html>
