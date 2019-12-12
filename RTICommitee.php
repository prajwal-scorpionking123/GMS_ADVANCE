<?php 
include('header.php');
?>
<br>
  <div class="container">
        <h3 style="color: red;">R.T.I. Cell</h3>
<?php 
require("db.php");
$sql="select * from committee_members where email='R.T.I.'";
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
<br><br>
<?php 
include('footer.php');
?>