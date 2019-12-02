
<?php
include('header.php');
?>
<?php
require("../db.php");
$em=$_SESSION['email'];
$get="select * from complaints where EMAIL='$em'";
$res=mysqli_query($conn,$get);
?>
<div class="container">
<br>
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="studentpanel.php">Home</a>
      </li>
      <li class="breadcrumb-item active">View Lodged Complaints</li>
    </ol>
  <br>
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
</div>
<?php
include('footer.php');
?>