  <?php  
 $connect = mysqli_connect("localhost", "root", "", "managit");  
 
 if(!empty($_POST))  
 {
    // if(isset($_POST ["poste"]) && isset($_POST ["enterprise"]) && isset($_POST ["note"]) && isset($_POST ["statut"]) && isset($_POST ["link"]))  {  

      $output = '';  
      $message = '';  
      $poste = mysqli_real_escape_string($connect, $_POST["poste"]);  
      $enterprise = mysqli_real_escape_string($connect, $_POST["enterprise"]);  
      $note = mysqli_real_escape_string($connect, $_POST["note"]);  
      $statut = mysqli_real_escape_string($connect, $_POST["statut"]);  
      $link = mysqli_real_escape_string($connect, $_POST["link"]);  
     //  $date = getdate();
      if($_POST["poste_id"] != '')  
      {  
           $query = "  
           UPDATE re 
           SET poste='$poste',   
           enterprise='$enterprise',   
           note='$note',   
           statut = '$statut',   
           link = '$link',
           date = NOW()
           WHERE id='".$_POST["poste_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO re(poste, enterprise, note, statut, link, date)  
           VALUES('$poste', '$enterprise', '$note', '$statut', '$link', NOW()) 
           ";  
           $message = '<h3>Data Inserted</h3>';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM re ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered table-hover">  
                     <tr>  
                     <th width="30%">Post</th>  
                     <th width="30%">Enterprise</th> 
                     <th width="1%">statut</th>  
                     <th width="6%">Link</th>  
                     <th width="18%">Date</th>  

                     <th width="5%">Edit</th>
                     <th width="5%">View</th>
                     <th width="5%">Delete</th>
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '
                     <tr>  
                     <td>'.$row["poste"].'</td>  
                     <td>'.$row["enterprise"].'</td>  
                     <td style="background-color: ' . $row["statut"] . ' ;"></td> 
                     <td><a href="' . $row["link"] . '" target="_blanck">Consulter</a></td> 
                     <td>'.$row["date"].'</td> 
                     <td><input type="button" name="edit" value="Edit" id="' . $row["id"] . '" class="btn btn-info btn-xs edit_data_poste" /></td>  
                     <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data_poste" /></td>
                     <td><a href="delete.php?idposte=' . $row["id"] . '"><input type="button" name="delete" value="Delete" id="' . $row["id"] . '" class="btn btn-info btn-xs delete_data" /></a></td> 
                     </tr>  
               ';  
           }  
           $output .= '</table>';  
      }  
      echo $output; 
    // }
 }  
 ?>