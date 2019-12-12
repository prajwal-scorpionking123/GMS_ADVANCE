<?php 
include('header.php');
?>
<?php 
require("db.php");
$sql="select * from committee_members where email='Student Grievance'";
$st=mysqli_query($conn,$sql);
?>
  <br>
  <div class="container">
        <h3 style="color: red;">Student Grievance Handling Commitee</h3>        

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

<p style="text-align: justify;">संबंधित समितीने विद्यार्थ्यांची संस्थेतील अध्यापन कार्य, विध्यार्थी उपक्रम, वसतिगृह, अथवा इतर काही मुद्या बाबत तक्रार प्राप्त झाल्यास त्या बाबत तात्काळ लक्ष घालून तक्रार निवारण्याचे कार्यवाही करावी.</p>
<div style="text-align: center; padding-left: 72%;">(प्रा.एम बी.कुमठेकर)<br>
    प्राचार्य<br>
    शासकीय अभियांत्रिकी महाविद्यालय, नागपूर</div>
    <p>प्रत: – १.समिती प्रमुख यांना माहिती साठी व आवश्यक कार्यवाहीसाठी<br>
        २. सूचना फलक<br>
        ३. विभाग प्रमुख स्थापत्य / यंत्र / विध्युत / अनुविध्युत / संगणक / पदार्थ विज्ञान / रसायनशास्त्र/ गणित / कर्मशाळा / ग्रंथायलंय / कार्यालय त्यांनी या आदेशाची प्रत विभागीय सूचना फलकावर त्यावावी.</p>
</div>

<?php 
include('footer.php');
?>


 



