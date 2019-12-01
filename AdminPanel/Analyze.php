<?php

require('././../db.php');
$currentMonth=date('m');
if($currentMonth==1)
$month_name='January';
if($currentMonth==2)
$month_name='Fabruary';
if($currentMonth==3)
$month_name='March';
if($currentMonth==4)
$month_name='April';
if($currentMonth==5)
$month_name='May';
if($currentMonth==6)
$month_name='June';
if($currentMonth==7)
$month_name='July';
if($currentMonth==8)
$month_name='August';
if($currentMonth==9)
$month_name='September';
if($currentMonth==10)
$month_name='October';
if($currentMonth==11)
$month_name='November';
if($currentMonth==12)
$month_name='Decemember';
$sql1="select CELL, count(sr) from complaints where DATES like '%$currentMonth%' and CELL='Anti-Ragging'";
$dataSet1=mysqli_query($conn,$sql1);
$AntiRagging=mysqli_fetch_array($dataSet1);


$sql2="select CELL, count(sr) from complaints where DATES like '%$currentMonth%' and CELL='SC/ST Grievance'";
$dataSet2=mysqli_query($conn,$sql2);
$SCST=mysqli_fetch_array($dataSet2);


$sql3="select CELL, count(sr) from complaints where DATES like '%$currentMonth%' and CELL='Student Grievance'";
$dataSet3=mysqli_query($conn,$sql3);
$StudentGrievance=mysqli_fetch_array($dataSet3);


$sql4="select CELL, count(sr) from complaints where DATES like '%$currentMonth%' and CELL='Women Grievance'";
$dataSet4=mysqli_query($conn,$sql4);
$WomanceGrievance=mysqli_fetch_array($dataSet4);

$sql5="select CELL, count(sr) from complaints where DATES like '%$currentMonth%' and CELL='R.T.I.'";
$dataSet5=mysqli_query($conn,$sql5);
$RTI=mysqli_fetch_array($dataSet5);
?>