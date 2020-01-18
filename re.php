<?php  
 $connect = mysqli_connect("localhost", "root", "", "managit");  
 $query = "SELECT * FROM re ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mes andidatures</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="jumbotron jumbotron-fluid" id="header">
        <div class="container">
            <img id="logo" src="images/nw-logo.png" alt="NumidiaLogo">
            <h1>Gestion des Candidatures</h1>
            <h3>la pêche est bonne</h3>
            <?php require 'menu.php'; ?> 
        </div>
    </div>
 
    <div class="container">  
         <div class="row">
               <div class="col-md-10">
                         <div class="table-responsive"> 
                         
                              <div align="right">  
                              <input type="text" id="myInput"  placeholder="Filter data table using keyword">
                              <button type="button" name="add_poste" id="add_poste" data-toggle="modal" data-target="#add_data_Modal_Poste" class="btn btn-warning">Add</button>  
                              </div>  
                              <br />  
                              <div id="poste_table">  
                                   <table class="table table-bordered table-hover" id="myTable">  
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
                                        <?php  
                                        while($row = mysqli_fetch_array($result))  
                                        {  
                                             $poste_date = strtotime($row['date']);
                                             $today = date("Y-m-d");
                                             $today = strtotime($today);
                                             $difference = $today - $poste_date;
                                             $difference_in_days = floor($difference/(60*60*24));
                                             $orange = 'orange'; $red = 'red';

                                             if ($difference_in_days > 15 && $row["statut"] != $red) {
                                                  //update with red statut
                                                  $query_statut = "UPDATE re SET statut='$red' WHERE id='".$row["id"]."'";
                                                  mysqli_query($connect, $query_statut);  

                                             }else if($difference_in_days > 7 && $row["statut"] != $orange){
                                                  // update with orange statut
                                                  $query_statut = "UPDATE re SET statut='$orange' WHERE id='".$row["id"]."'"; 
                                                  mysqli_query($connect, $query_statut);
                                             }
                                            
                                        ?>  
                                        <tr>  
                                             <td style="font-weight: bold; color: #17A2B8;"><?php echo $row["poste"]; ?></td>  
                                             <td style="font-weight: bold; color: #17A2B8;"><?php echo $row["enterprise"]; ?></td>  
                                             <td style="background-color:<?php echo $row["statut"]; ?>;"></td> 
                                             <td style="font-weight: bold; color: #17A2B8;"><a href="<?php echo $row["link"];?>" target="_blanck">Consulter</a></td> 
                                             <td style="font-weight: bold; color: #17A2B8;"><?php echo $row["date"]; ?></td> 
                                             <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data_poste" /></td>  
                                             <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data_poste" /></td>
                                             <td><a href=" delete.php?idposte=<?php echo $row["id"]; ?> "><input type="button" name="delete" value="Delete" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs delete_data" /></a></td> 
                                        </tr>  
                                        <?php  
                                        }  
                                        ?>  
                                   </table>  
                              </div>  
                         </div> 
                </div>
                <div class="col-md-2 asidediv">
                     <h3>Informations intéressante</h3>
                         <?php 
                                        $req ="SELECT COUNT(id) as total FROM re";
                                        $nbr = mysqli_query($connect, $req);  
                                        $nmbr_rows = mysqli_fetch_assoc($nbr);
                                        $num_rows = $nmbr_rows['total'];

                                        $req1 ="SELECT date FROM re";
                                        $all_date = mysqli_query($connect, $req1);  
                                        while ($all_date_rows = mysqli_fetch_array($all_date)) {
                                             echo '<span class="all-date-id"> ' . $all_date_rows["date"] . '</span><br>';                                       

                                             
                                        }

                                        // $req1 ="SELECT date FROM re";
                                        // $all_date = mysqli_query($connect, $req1);  
                                        // while ($all_date_rows = mysqli_fetch_array($all_date)) {
                                        //      echo '<span class="all-date-id"> ' . $all_date_rows["date"] . '</span><br>';
                                        //      // echo $echo_date;
                                        // }
                         
                         ?>
                        <h5><br>Total candidatures:<br><br><?php  echo $num_rows; ?>  </h5>
                        

                        <!-- <p>Grandir le pénis</p> -->
                        <!-- <h4>quelque notes</h4>
                        <ul>
                         <li>preoduits pour le pénis</li>
                         <li>grandir mon pénis</li>
                         <li>remplir la feuille des assurences croix blue</li>
                         <li>new projet web data sauvgarde system think about it</li>
                         <li>think about !!</li>
                        
                        </ul> -->
                                        
                        
                </div>
          </div> 
     </div>  
     <?php require 'footer.php'; ?>
      </body>  
 </html>
 
  <!--Formulaire view DATA (select/view)-->
 <div id="dataModalPoste" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Poste Details</h4>  
                </div>  
                <div class="modal-body" id="poste_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
 
  <!--Formulaire d'insertion de DATA (add/Update)-->
 <div id="add_data_Modal_Poste" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Ajouter une candidature</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_poste">    
                          <label>Poste</label>  
                          <select name="poste" id="poste" class="form-control">  
                               <option value="développeur web">Développeur web</option>  
                               <option value="intégrateur web">Intégrateur web</option>  
                               <option value="developpeur wordpress">Développeur wordpress</option>  
                               <option value="Driver">Driver</option>  
                               <option value="livreur">Livreur</option>  
                               <option value="développeur web front end">Développeur web front end</option>  
                               <option value="développeur web backend">Développeur web backend</option>  
                               <option value="développeur web junior">Développeur web junior</option>  
                          </select>  
                          <br />  
                          <label>Enterprise</label>  
                          <input type="text" name="enterprise" id="enterprise" class="form-control" />  
                          <br />
                          <label>Notes/Remarques</label>  
                          <textarea class="form-control" rows="4" cols="50" id="note" name="note"></textarea>
                          <br />

                          <label>Statut</label>  
                          <select name="statut" id="statut" class="form-control">  
                               <option value="green">On process or interested</option>  
                               <option value="orange">No Answer</option>  
                               <option value="red">Rejected or refused</option>  
                          </select> 
                          <br />  

                          <label>Link/Source</label>  
                          <input type="text" name="link" id="link" class="form-control" />  
                          <br />  

                          <input type="hidden" name="poste_id" id="poste_id" />  
                          <input type="submit" name="insert" id="insert_poste" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
