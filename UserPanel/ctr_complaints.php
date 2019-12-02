<?php
require("../db.php");
$data0=$_POST['id'];
$data1=$_POST['name'];
$data2=$_POST['email'];
$data3=$_POST['type'];
$data4=$_POST['subject'];
$data5=$_POST['desc'];
$curdate=date('Y/m/d');
$insert="INSERT INTO complaints(ID,COMPLAINER,EMAIL,CELL,SUB,DESCRIP,DATES)VALUES('$data0','$data1','$data2','$data3','$data4','$data5','$curdate')";
$st=mysqli_query($conn,$insert);
if($st)
{
  
    header("location:studentpanel.php?st=1");
}
else
{
    header("location:complaintform.php?st=2");
}

?>