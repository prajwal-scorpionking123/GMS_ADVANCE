<?php
$connect = mysqli_connect("localhost", "root", "", "gpm_db2");
if(isset($_POST["first_name"], $_POST["last_name"],$_POST["email"]))
{
 $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
 $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);
 $email= mysqli_real_escape_string($connect, $_POST["email"]);
 $query = "INSERT INTO committee_members(fname, lname,email) VALUES('$first_name', '$last_name','$email')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>