
<?php
session_start();
if(!isset($_SESSION['user']))
{
 header("location:signin.html");
}
?>
<?php
require("db.php");
$em=$_SESSION['email'];
$get="select * from complaints where EMAIL='$em'";
$res=mysqli_query($conn,$get);
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
        <a class="nav-link" href="studentpanel.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="posts.php">Lodged Grievances  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="complaintform.php">Lodge Grievance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Track</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="logout1.php">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    </form>
  </div>
</nav>

<div class="content-wrapper">
    <div class="container-fluid">
      <div class="card mb-3" >
        <div class="card-header">
          <i class="fa fa-table"></i>Submitted Complaints</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" style="width:100%;" cellspacing="0">
              <thead>
                <tr>
				 
			       <th>DATE</th>
                  <th>TO</th>
                  <th>COMPLAINT</th>
                  <th>STATUS</th>
                </tr>
              </thead>
              <tbody>
              <?php
			 
       while($rows=mysqli_fetch_array($res))
       {
        
         echo "<tr>
               <td>$rows[7]</td>
               <td>$rows[4]</td>
               <td>
               <form action=viewcomplaint.php method=post>
               <input type=hidden name=sr value=$rows[0]>
               <input type=hidden name=id value=$rows[1]>
                <button data-toggle=modal  data-target=#myModal type=submit style=background:blue;color:white; class=btn btn-primary>View</button>
               
               </form>
               </td>
               <td>$rows[8]</td>
         </tr>";
       }
       ?>

              </tbody>
              <tfoot>
                <tr>
                <th>DATE</th>
                  <th>TO</th>
                  <th>COMPLAINT</th>
                  <th>STATUS</th>
                </tr>
              </tfoot>
			  <tbody>
			  </tbodY>
            </table>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
     
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>