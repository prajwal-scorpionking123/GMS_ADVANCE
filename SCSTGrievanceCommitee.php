<?php 
include('header.php');
?>
  <br>
  <div class="container">
        <h3 style="color: red;">Grievance Handling Committee for The Scheduled Castes and the Scheduled Tribes (Prevention of Atrocities) Act 1989</h3>  
        
<?php 
require("db.php");
$sql="select * from committee_members where email='SC/ST Grievance'";
$st=mysqli_query($conn,$sql);
?>             
<?php
echo '<table class="table table-striped">';
echo "<tr><th>Name Of Member</th><th>Position</th></tr>";
while($rows=mysqli_fetch_array($st))
{
 
  echo "<tr>";
  echo "<td>$rows[2]</td><td>$rows[3]</td>";
  echo "</tr>";
 
}
echo "</table>";
?>
</div>
<br><br><br><br><br><br><br>
<?php 
include('footer.php');
?>

