<?php 
include('header.php'); 
?>
<?php
session_start();
require("../db.php");
$sr=$_POST['sr'];
$id=$_POST['id'];
$get="select * from complaints where SR=$sr and ID=$id";
$res=mysqli_query($conn,$get);
$row=mysqli_fetch_array($res);
?>
<br>
<div class="container">
<br>
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="studentpanel.php">Home</a>
      </li>
      <li class="breadcrumb-item active">View Complaints</li>
    </ol>

  <div class="card card-register mx-auto mt-5">
          <div class="card-header">Grievance Form</div>
          <div class="card-body">
          <form action="ctr_complaints.php" method="POST">
            <div class="form-group">
            <div class="form-row">
                    <div class="col-md-10 mb-3">
                    <label for="exampleFormControlInput1">To</label>
                    <input readonly value="<?php echo $row['CELL'];?> cell"class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                  
            </div>
          </div>
          
            <div class="form-group">
            <div class="form-row">
            <div class="col-md-10 mb-3">
              <label for="exampleFormControlTextarea1">Subject</label>
              <textarea  class="form-control" name="subject"id="exampleFormControlTextarea1" rows="1" required readonly><?php echo $row['SUB'];?></textarea>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="form-row">
            <div class="col-md-10 mb-3">
              <label for="exampleFormControlTextarea1">Describe your complaint in 150 words</label>
              <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="10" required readonly><?php echo $row['DESCRIP'];?></textarea>
            </div>
            </div>
</div>
<?php 
include('footer.php'); 
?>