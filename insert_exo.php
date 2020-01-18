  <?php  
 $connect = mysqli_connect("localhost", "root", "", "managit");  
 
 if(!empty($_POST))  
 {
    // if(isset($_POST ["poste"]) && isset($_POST ["enterprise"]) && isset($_POST ["note"]) && isset($_POST ["statut"]) && isset($_POST ["link"]))  {  

      $output = '';  
      $message = '';  
      $titre = mysqli_real_escape_string($connect, $_POST["titre"]); 
      $language = mysqli_real_escape_string($connect, $_POST["language"]);   
      $enonce = mysqli_real_escape_string($connect, $_POST["enonce"]);
      $remarque = mysqli_real_escape_string($connect, $_POST["remarque"]);  
      $source = mysqli_real_escape_string($connect, $_POST["source"]);  
      $link = mysqli_real_escape_string($connect, $_POST["link"]); 
      $lanote = mysqli_real_escape_string($connect, $_POST["lanote"]);  
     //  $date = getdate();
      if($_POST["exo_id"] != '')  
      {  
           $query = "  
           UPDATE exo
           SET   titre='$titre', 
           language='$language',     
           enonce='$enonce', 
           remarque='$remarque', 
           date = NOW(),   
           source = '$source',
           link = '$link',
           lanote = '$lanote'
           WHERE id='".$_POST["exo_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO exo (titre, language, enonce, remarque, date, source, link, lanote)  
           VALUES('$titre', '$language', '$enonce', '$remarque', NOW(), '$source', '$link', '$lanote') 
           ";  
           $message = '<h3>Data Inserted</h3>';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM exo  ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
           <table class="table table-bordered table-hover" id="myTable">  
           <tr>  
                <th width="15%">Titre</th>  
                <th width="10%">language</th> 
                <th width="30%">remarque</th> 
                <th width="15%">Date</th> 
                <th width="5%">Source</th>  
                <th width="5%">Link</th>  
                <th width="5%">La Note</th>  

                <th width="5%">Edit</th>
                <th width="5%">View</th>
                <th width="5%">Delete</th>
           </tr>  
           <?php  
           while($row = mysqli_fetch_array($result))  
           {  
           ?>  
           <tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '
                     <tr>  
                     <td>'.$row["titre"].'</td>  
                     <td>'.$row["language"].'</td>  
                     <td>'.$row["remarque"].'</td>  
                     <td>'.$row["date"].'</td> 
                     <td>'.$row["source"].'</td>  
                     <td>'.$row["link"].'</td>  
                     <td>'.$row["lanote"].'</td>  
                    
                     <td><input type="button" name="edit" value="Edit" id="' . $row["id"] . '" class="btn btn-info btn-xs edit_data_exo" /></td>  
                     <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data_exo" /></td>
                     <td><a href="delete.php?idexo=' . $row["id"] . '"><input type="button" name="delete" value="Delete" id="' . $row["id"] . '" class="btn btn-info btn-xs delete_data" /></a></td> 
                     </tr>  
               ';  
           }  
           $output .= '</table>';  
      }  
      echo $output; 
    // }
 }  
 ?>