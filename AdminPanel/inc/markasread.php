<?php
session_start();
require('././../db.php');
$sr=$_POST['sr'];
//$id=$_POST['id'];
$pane=$_POST['pane'];
echo $pane;
//$conn=mysqli_connect("localhost","root","","gpm_db");
$get="update complaints set STATUS='SEEN' where SR=$sr";
$res=mysqli_query($conn,$get);
if($res)
{
    if($pane=="anti")
    {
    header("location:AntiRagging.php");
    }
    if($pane=="SCST")
    {
    header("location:scstgrievances.php");
    }
    if($pane=="WO")
    {
    header("location:womangrievance.php");
    }
    if($pane=="student")
    {
        header("location:studentgrievance.php");
    }
    if($pane=="R.T.I")
    {
        header("location:RTI.php");
    }
    
    
}
else
{
    header("location:viewcomplaintadmin.php");
}
?>