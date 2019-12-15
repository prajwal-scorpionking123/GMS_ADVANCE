<?php
$connect = mysqli_connect("localhost", "root", "", "gpm_db2");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM committee_members WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>
