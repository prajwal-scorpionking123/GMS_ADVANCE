<?php
$admin=$_POST['email'];
$pass=$_POST['pass'];

if($admin=="admin@123" && $pass=="Pass@123")
{
    session_start();
    $_SESSION['admin']="admin@123";
    $_SESSION['pass']=$pass;
    header("location:./AdminPanel/admin.php");
}
else
{
    header("location:adminsignin.php");
}
?>