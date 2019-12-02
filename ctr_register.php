<?php
session_start();
require("db.php");
$name=$_POST['fname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$pass=$_POST['pass'];
$mob=$_POST['mob'];

$checkEmailQuery="select * from users where EMAIL=$email";
$insert="INSERT INTO users(FULLNAME,EMAIL,GENDER,PASS,MOB) VALUES ('$name','$email','$gender','$pass','$mob')";


if(mysqli_query($conn,$checkEmailQuery))
{
    echo "<h3>Already Registered</h3>";
}
else
{
   if(mysqli_query($conn,$insert))
   {
    $_SESSION['user']=$name;
    $_SESSION['email']=$email;
	$_SESSION['mobile']=$mob;
      header("location:./UserPanel/studentpanel.php");
   }
   else
   {
       header("localhost:register.html");
   }

}











?>