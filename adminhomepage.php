<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Home</title>
  </head>
  <body>
    <ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link " href="adminhomepage.php" >welcome ADMIN</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link " href="adpro.php" target="_parent">Orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="newp.html">Add New Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="avai.php">Products IN Canteen</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link " href="logout.php" >logout</a>
  </li>
</ul>

  </body>
</html>
<html>
<body>
<div class="container">
<div class="shadow-lg p-3 mb-5 bg-white rounded">
<table class="table" border="1">


<tr>
  <td class="table-info">ID</td>
  <td class="table-info">Name</td>
  <td class="table-info">Gender</td>
  <td class="table-info">your username</td>
  <td class="table-info">Address</td>
  <td class="table-info">contact</td>
  <td class="table-info">start</td>
  <td class="table-info">stop</td>
</tr>
</div>
<?php
// $aname= $_SESSION['u2'];
// echo $aname;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM user;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
   $aab=$row['username'];
   echo "<tr><td>";
   echo $row['uid'];
   echo "</td><td>";
   echo $row['name'];
   echo "</td><td>";
   echo $row['gender'];
   echo "</td><td>";
   echo $row['username'];
   echo "</td><td>";
   echo $row['address'];
   echo "</td><td>";
   echo $row['contact'];
   echo "</td><td>";
   ?>
   <html>
   <body>
  <!-- <form action="change.php"> -->
    <a href="change.php?id=<?php echo $row['username'] ?>">Start</a>
  <!-- </form> -->
</body>
</html>
   <?php
   echo $row['start_id'];
   echo "</td><td>";
   ?>
   <html>
   <body>
  <!-- <form action="change2.php"> -->
      <a href="change2.php?id=<?php echo $row['username'] ?>">Stop</a>
  <!-- </form> -->
</body>
</html>
   <?php
   echo $row['stop_id'];
   echo "</td><td>";
   echo "</td></tr>";
 }
}
// $count=0;
// $sql = "SELECT * FROM orders where oby='$aab' and payment='Payment Due';";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//  while($row = $result->fetch_assoc()) {
//    $price=$row['oprice'];
//    $count=$price+$count;
//  }
// }
// echo '<h3 class="alert alert-warning alert-dismissible fade show">You total payment due:₹'. $count;
?>
<br>
</table>
</div>
<form  action="homepage.php" method="post">
<input  class="btn btn-info" type="submit" name="" value="GO BACK">
</form>


</body>
</html>
