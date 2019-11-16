<?php
session_start();
if( isset( $_SESSION['u2'] ) ){
}
else{
  header("location:loginuser.php");
}
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
         $answer1 = $_POST['question-1-answers'];
          $answer2 = $_POST['question-2-answers'];
         // $answer3 = $_POST['question-3-answers'];
         // $answer4 = $_POST['question-4-answers'];
         // $answer5 = $_POST['question-5-answers'];

         $totalCorrect = 0;

         if ($answer1 == "B") { $totalCorrect++; }
          if ($answer2 == "B") { $totalCorrect++; }
         // if ($answer3 == "C") { $totalCorrect++; }
         // if ($answer4 == "D") { $totalCorrect++; }
         // if ($answer5) { $totalCorrect++; }

         echo "<div id='results'>$totalCorrect / 5 correct</div>";




         $_SESSION["u2"] = $row["username"];

         echo "connected";
       } else{
         echo "You've been blocked!";
         $answer1 = $_POST['question-1-answers'];
          $answer2 = $_POST['question-2-answers'];
         // $answer3 = $_POST['question-3-answers'];
         // $answer4 = $_POST['question-4-answers'];
         // $answer5 = $_POST['question-5-answers'];

         $totalCorrect = 0;

         if ($answer1 == "B") { $totalCorrect++; }
          if ($answer2 == "B") { $totalCorrect++; }
         // if ($answer3 == "C") { $totalCorrect++; }
         // if ($answer4 == "D") { $totalCorrect++; }
         // if ($answer5) { $totalCorrect++; }

         echo "<div id='results'>$totalCorrect / 5 correct</div>";

       }
     }
   }
?>
         <script>
         (function (global) {

             if(typeof (global) === "undefined") {
                 throw new Error("window is undefined");
             }

             var _hash = "!";
             var noBackPlease = function () {
                 global.location.href += "#";

                 // making sure we have the fruit available for juice (^__^)
                 global.setTimeout(function () {
                     global.location.href += "!";
                 }, 50);
             };

             global.onhashchange = function () {
                 if (global.location.hash !== _hash) {
                     global.location.hash = _hash;
                 }
             };

             global.onload = function () {
                 noBackPlease();

                 // disables backspace on page except on input fields and textarea..
                 document.body.onkeydown = function (e) {
                     var elm = e.target.nodeName.toLowerCase();
                     if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                         e.preventDefault();
                     }
                     // stopping event bubbling up the DOM tree..
                     e.stopPropagation();
                 };
             }

         })(window);
         </script>
<html>
<a href="homepage.php">Go to home</a>
</html>
