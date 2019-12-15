<?php  
 if(isset($_POST["sr"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "gpm_db2");  
      $query = "SELECT * FROM complaints WHERE SR = '".$_POST["sr"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);    
      $output .= '<div class="container">';
     
    $output .= '  <label>Subject</label><input type="text" class="form-control" value="'.$row["SUB"].'" readonly><br>
    <label>Description</label><textarea class="form-control" rows="10" cols="20">'.$row["DESCRIP"].'</textarea>';
      $output .= '</div>';  
      $query="UPDATE complaints SET STATUS='SEEN' WHERE SR = '".$_POST["sr"]."'";
      $result = mysqli_query($connect, $query);  
      echo $output;  
 }  
 ?>