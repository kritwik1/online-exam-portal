<?php
session_start();
if( isset( $_SESSION['u2'] ) ){
   header("location: homepage.php");

}
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title> Login Form</title>
</head>
<body>
    <div class="container">
      <h1 style="text-align:center;">User Login Page</h1>
    </div>
    <div class="jumbotron">
    <div class="container">

    <form method="post" action="login.php" >
        <table  >
            <tr>
                <td><label for="users_email">Email</label></td>
                <td><input type="text" name="users_email" id="users_email"></td>
            </tr>
            <tr>
                <td><label for="users_pass">Password</label></td>
                <td><input name="users_pass"

                  type="password" id="users_pass"></input></td>
            </tr>
            <tr>
                <td><input type="submit"  class="btn btn-primary" value="Submit"/>
                <td><input type="reset"  class="btn btn-danger" value="Reset"/>
            </tr>
        </table>
    </form>
      </div>
        </div>
    <br>
      <div class="container">
    <a class="btn btn-info" href='register.html'>Create User</a>
    </div>
    <br>
      <div class="container">
    <a class="btn btn-info" href='home.html'>GO BACK</a>
    </div>
</body>
</html>
