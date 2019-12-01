<?php
session_start();
// error_reporting(E_PARSE | E_ERROR);
require("db.php");
// if($conn)
// {
//     echo "success";
// }
$admin=$_POST['email'];
$pass=$_POST['pass'];
$checkEmailQuery="select * from users where EMAIL='$admin' and PASS='$pass'";
$res=mysqli_query($conn,$checkEmailQuery);
$rows=mysqli_fetch_array($res);
if($res)
 {	
        $_SESSION['user']=$rows[1];
        $_SESSION['pass']=$rows[4];
        $_SESSION['email']=$rows[2];
        $_SESSION['id']=$rows[0];
 	 	header("location:studentpanel.php");	
 }
 else
 {
     header("location:signin.html");     
 }
?>