<?php
session_start();
// require('db.php');
require('././../db.php');
//$conn=mysqli_connect("localhost","root","","gpm_db");
$sr=$_POST['sr'];
// $id=$_POST['id'];
$get="select * from complaints where SR=$sr";
$res=mysqli_query($conn,$get);
$row=mysqli_fetch_array($res);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>
<br>
<div class="container">
<form action="markasread.php" method="POST">
<!-- <div class="form-group">
    <label for="exampleFormControlInput1">NAME OF COMPLAINER</label>
    <input type="text" readonly name="name" value=""class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">EMAIL</label>
    <input type="text" readonly name="email" value=""class="form-control" id="exampleFormControlInput1" placeholder="">
  </div> -->
  <div class="form-group">
    <label for="exampleFormControlInput1">NAME OF COMPLAINER</label>
    <input type="text" readonly name="name" value="<?php echo $row[2];?>"class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">EMAIL</label>
    <input type="text" readonly name="email" value="<?php echo $row[3];?>"class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">TO</label>
    <input type="text"readonly name="text" value="<?php echo $row[4];?>"class="form-control" id="exampleFormControlInput1" placeholder="">
   
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Subject</label>
    <textarea readonly class="form-control"  value="" name="subject"id="exampleFormControlTextarea1" rows="1"><?php echo $row[5];?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea readonly class="form-control"  name="desc" id="exampleFormControlTextarea1" rows="10" ><?php echo $row[6];?></textarea>
  </div>
  <input type="hidden"name="sr" value="<?php echo $sr;?>">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <input type="hidden" name="pane" value="<?php echo $_POST['pane']?>">
  <button type="submit" class="btn btn-primary btn-lg">Mark As Read</button>
</form>
</div>
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>