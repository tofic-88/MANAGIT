  <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "managit");  

 if(isset($_POST["client_id"]))  
 {  
      $query = "SELECT * FROM tbl_client WHERE id = '".$_POST["client_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 } else if(isset($_POST["poste_id"]))  
 {  
      $query = "SELECT * FROM re WHERE id = '".$_POST["poste_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 } else if(isset($_POST["exo_id"]))  
 {  
      $query = "SELECT * FROM exo WHERE id = '".$_POST["exo_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }




 ?>
 