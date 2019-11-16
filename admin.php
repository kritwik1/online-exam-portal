<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";
$id = $_POST['a_email'];
$pass = $_POST['a_pass'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT aname, apass, aid FROM admin where aname='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       if($id==$row["aname"] && $pass==$row["apass"]){

         header("location: adminhomepage.php");
         echo "connected";
       }
       else{
         echo "invalid Wrong password";
         echo "<a href='home.html'>GO BACK</a>";
       }
   }
} else {
   echo "invalid user";
   echo "<a href='home.html'>GO BACK</a>";
}?>


<?php
$conn->close();
?>
