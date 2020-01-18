  <?php  
 $connect = mysqli_connect("localhost", "root", "", "managit");  
 
 if(!empty($_POST))  
 {
     // if(isset($_POST ["name"]) && isset($_POST ["type_client"]) && isset($_POST ["telephone"]) && isset($_POST ["email"]) && isset($_POST ["remarque"]))  {

      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $type_client = mysqli_real_escape_string($connect, $_POST["type_client"]);  
      $telephone = mysqli_real_escape_string($connect, $_POST["telephone"]);  
      $email = mysqli_real_escape_string($connect, $_POST["email"]);  
      $remarque = mysqli_real_escape_string($connect, $_POST["remarque"]);  
      if($_POST["client_id"] != '')  
      {  
           $query = "  
           UPDATE tbl_client  
           SET nom='$name',   
           type_client='$type_client',   
           telephone='$telephone',   
           email = '$email',   
           remarque = '$remarque' 
           WHERE id='".$_POST["client_id"]."'";  
           $message = '<h3>Data Updated</h3>';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO tbl_client(nom, type_client, telephone, email, remarque)  
           VALUES('$name', '$type_client', '$telephone', '$email', '$remarque');  
           ";  
           $message = '<h3>Data Inserted</h3>';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM tbl_client ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered table-hover">  
                     <tr>  
                          <th width="45%">Employee Name</th>  
                          <th width="20%">Téléphone</th>  
                          <th width="20%">Email</th>  
                          <th width="5%">Edit</th>  
                          <th width="5%">View</th>  
                          <th width="5%">Delete</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["nom"] . '</td>  
                          <td>' . $row["telephone"] . '</td>  
                          <td>' . $row["email"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                          <td><input type="button" name="delete" value="delete" id="' . $row["id"] . '" class="btn btn-info btn-xs delete_data" /></td> 
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output; 
//     }
 }  
 ?>
 