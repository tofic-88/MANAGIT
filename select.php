 <?php  
 if(isset($_POST["client_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "managit");  
      $query = "SELECT * FROM tbl_client WHERE id = '".$_POST["client_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["nom"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Type Client</label></td>  
                     <td width="70%">'.$row["type_client"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Telephone</label></td>  
                     <td width="70%">'.$row["telephone"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Remarque</label></td>  
                     <td width="70%">'.$row["remarque"].' Year</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }else if(isset($_POST["poste_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "managit");  
      $query = "SELECT * FROM re WHERE id = '".$_POST["poste_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Poste</label></td>  
                     <td width="70%">'.$row["poste"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Enterprise</label></td>  
                     <td width="70%">'.$row["enterprise"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Notes/Remarque</label></td>  
                     <td width="70%">'.$row["note"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Statut</label></td>  
                     <td width="70%">'.$row["statut"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Link</label></td>  
                     <td width="70%">'.$row["link"].' Year</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }else if(isset($_POST["exo_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "managit");  
      $query = "SELECT * FROM exo WHERE id = '".$_POST["exo_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>titre</label></td>  
                     <td width="70%">'.$row["titre"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Language</label></td>  
                    <td width="70%">'.$row["language"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Énoncé</label></td>  
                     <td width="70%">'.$row["enonce"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Notes/Remarque</label></td>  
                     <td width="70%">'.$row["remarque"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Date</label></td>  
                    <td width="70%">'.$row["date"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Source</label></td>  
                    <td width="70%">'.$row["source"].'</td>  
               </tr>
                <tr>  
                     <td width="30%"><label>Link</label></td>  
                     <td width="70%">'.$row["link"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>La note</label></td>  
                     <td width="70%">'.$row["lanote"].' Year</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }   
   


 ?>
 