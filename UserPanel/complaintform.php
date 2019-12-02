<?php
session_start();
if(!isset($_SESSION['user']))
{
 header("location:../login.php");
}
?>
<?php
error_reporting(E_PARSE|E_ERROR);
if($_GET['st']==2)
{
 echo '<script>alert("Grievance Submitted Successfully..")</script>';
}
?>
<?php
include('header.php')
?>
<div class="container">
  <br>
<ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Lodge Grievance</li>
</ol>
          <div class="card card-register mx-auto mt-5">
          <div class="card-header">Grievance Form</div>
          <div class="card-body">
          <form action="ctr_complaints.php" method="POST">
          <div class="form-group">
          <div class="form-row">
              <div class="col-md-5 mb-3">
              <label for="exampleFormControlInput1">Your Name</label>
              <input type="text" name="name" value="<?php echo $_SESSION['user'];?>"class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="col-md-5 mb-3">
              <label for="exampleFormControlInput1">Email address</label>
              <input type="email" name="email" value="<?php echo $_SESSION['email'];?>"class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>
          </div>
            <div class="form-group">
            <div class="form-row">
            <div class="col-md-5 mb-3">
              <label for="exampleFormControlSelect1">select complaint type</label>
              <select name="type" class="form-control" id="exampleFormControlSelect1" required>
                <option value="SC/ST Grievance">SC/ST Grievance</option>
                <option value="Student Grievance">Student Grievance</option>
                <option value="Women Grievance">Women Grievance</option>
                <option value="Anti-Ragging">Anti-Ragging</option>
                <option value="R.T.I.">R.T.I.</option>
              </select>
            </div>
            <div class="col-md-5 mb-3">
            <label for="exampleFormControlInput1">Mobile No.</label>
            <input type="text" name="mobile" value="<?php echo $_SESSION['mobile'];?>"class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            </div>
            </div>
          
            <div class="form-group">
            <div class="form-row">
            <div class="col-md-10 mb-3">
              <label for="exampleFormControlTextarea1">Subject</label>
              <textarea class="form-control" name="subject"id="exampleFormControlTextarea1" rows="1" required></textarea>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="form-row">
            <div class="col-md-10 mb-3">
              <label for="exampleFormControlTextarea1">Describe your complaint in 150 words</label>
              <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="10" required></textarea>
            </div>
            </div>
  </div>
 
  <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
</form>
<br>
</div>
</div>
</div>
</div>
  <?php
include('footer.php');
  ?>