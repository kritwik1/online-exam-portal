
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";
$count=0;
$id = $_POST['users_email'];
$pass = $_POST['users_pass'];
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
       if($row["start_id"]==1 && $row["stop_id"]==0&&$id==$row["username"] && $pass==$row["password"]){

         session_start();
         $_SESSION["u2"] = $row["username"];
         header("location: homepage.php");
         echo "connected";
       }
       else if($row["start_id"]==1 && $row["stop_id"]==0){
         echo "invalid Wrong password";
         echo "<a href='home.html'>GO BACK</a>";
       }
       else{
         echo "You've been blocked! now cry...";
       }
   }
} else {
   echo "invalid user";
   echo "<a href='home.html'>GO BACK</a>";
}

$conn->close();
?>
