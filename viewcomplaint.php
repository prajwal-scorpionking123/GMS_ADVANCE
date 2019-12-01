<?php
session_start();
require("db.php");
$sr=$_POST['sr'];
$id=$_POST['id'];
$get="select * from complaints where SR=$sr and ID=$id";
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <title>student</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><h3><i class="fa fa-user-circle"><?php echo $_SESSION['user']; ?></i></h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="studentpanel.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="posts.php">Lodged Grievances</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="complaintform.php">Lodge Grievance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Track </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="logout1.php">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    </form>
  </div>
</nav><br>
<div class="container">
<form action="#" method="POST">
<!--  -->
  <div class="form-group">
    <label for="exampleFormControlSelect1">TO</label>
    <input type="text" name="text" readonly value="<?php echo $row[4];?>"class="form-control" id="exampleFormControlInput1" placeholder="">
   
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Subject</label>
    <textarea class="form-control"  readonly value="" name="subject"id="exampleFormControlTextarea1" rows="1"><?php echo $row[5];?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Describe your complaint in 150 words</label>
    <textarea class="form-control"  readonly name="desc" id="exampleFormControlTextarea1" rows="10" ><?php echo $row[6];?></textarea>
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