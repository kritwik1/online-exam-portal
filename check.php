<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";
$id=$_REQUEST['name'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user where username='$id'";
$result = mysqli_query($conn,$sql);
$rows = array();
while($a = mysqli_fetch_assoc($result)){
  $rows[] = $a;
}
echo json_encode($rows);
?>
