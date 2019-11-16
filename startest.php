<?php
session_start();
if( isset( $_SESSION['u2'] ) ){
  $name =  $_SESSION['u2'];
}
else{
  header("location:loginuser.php");
}

 ?>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>TEST PAGE</title>
<head>

</head>
<!-- onload function is evoke when page is load -->
<!--countdown function is called when page is loaded -->

<body onload="a(<?php echo "'".$name."'" ;?>);">
	<div>
		Time Left ::
    <h2 id="timed_rem"></h2>
	</div>
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
           echo '<form id="myForm" action="grade.php" method="post" id="quiz">
           <li>

             <h3>CSS Stands for...</h3>

             <div>
                 <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                 <label for="question-1-answers-A">A) Computer Styled Sections </label>
             </div>

             <div>
                 <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                 <label for="question-1-answers-B">B) Cascading Style Sheets</label>
             </div>

             <div>
                 <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                 <label for="question-1-answers-C">C) Crazy Solid Shapes</label>
             </div>

             <div>
                 <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                 <label for="question-1-answers-D">D) None of the above</label>
             </div>
             <h3>HTML Stands for...</h3>

             <div>
                 <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                 <label for="question-1-answers-A">A) Computer Styled Sections </label>
             </div>

             <div>
                 <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                 <label for="question-1-answers-B">B) Hyper Text Markup Language</label>
             </div>

             <div>
                 <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                 <label for="question-1-answers-C">C) Hyper</label>
             </div>

             <div>
                 <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                 <label for="question-1-answers-D">D) None of the above</label>
             </div>
         </li>
         <br>
         <input class="btn btn-primary" type="submit" value="Submit Quiz" />';

           // $/_SESSION["u2"] = $row["username"];
           // $n//ame = $_SESSION['u2'];
           // echo "connected";
         } else{
           echo "You've been blocked!";
         }
       }
     }
        ?>
<!-- <script>
setTimeout(function(){
  window.location.reload(1);
}, 1000);
</script> -->
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
function startTimer(duration, display,name) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);
        end(name);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        document.getElementById("timed_rem").innerHTML = minutes + ":" + seconds;

        if (--timer < 0) {
          // alert("Test FINISHED");
          document.getElementById("myForm").submit();

        }
    }, 1000);
}
</script>
<script type="text/javascript">
function a(name) {
  // alert(name);
    var fiveMinutes = 60 * 0.5,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display,name);
};
</script>
<script type="text/javascript">
  function end(name){
    var name = name;
    $.ajax({
      type:'POST',
      data:{name},
      url:'check.php',
      success:function(data){
        var ar = JSON.parse(data);
        if(ar[0].stop_id==1){
          alert("banned");
          document.getElementById("myForm").submit();

        }
        console.log(ar);
      }
    })
  }

</script>

</body>

</html>
