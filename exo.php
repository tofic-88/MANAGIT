<?php  
 $connect = mysqli_connect("localhost", "root", "", "managit");  
 $query = "SELECT * FROM exo ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mes EXOS</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

     <?php require 'header.php'; ?>
 
    <div class="container">  
         <div class="row">
               <div class="col-md-10">
                         <div class="table-responsive"> 
                         
                              <div align="right">  
                              <input type="text" id="myInput"  placeholder="Filter data table using keyword">
        
                              <button type="button" name="add_exo" id="add_exo" data-toggle="modal" data-target="#add_data_Modal_Exo" class="btn btn-warning">Add</button>  
                              </div>  
                              <br />  
                              <div id="exo_table">  
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
                                             <td><?php echo $row["titre"]; ?></td>  
                                             <td><?php echo $row["language"]; ?></td>  
                                             <td><?php echo $row["remarque"]; ?></td> 
                                             <td><?php echo $row["date"]; ?></td> 
                                             <td><?php echo $row["source"]; ?></td>  
                                             <td><a href="<?php echo $row["link"];?>" target="_blanck">Consulter</a></td>                                              
                                             <td><?php echo $row["lanote"]; ?></td>  
                             
                                             <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data_exo" /></td>  
                                             <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data_exo" /></td>
                                             <td><a href=" delete.php?idexo=<?php echo $row["id"]; ?> "><input type="button" name="delete" value="Delete" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs delete_data" /></a></td> 
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
                                        $req ="SELECT COUNT(id) as total FROM exo";
                                        $nbr = mysqli_query($connect, $req);  
                                        $nmbr_rows = mysqli_fetch_assoc($nbr);
                                        $num_rows = $nmbr_rows['total'];

                                        $req1 ="SELECT * FROM exo";
                                        $all_exo = mysqli_query($connect, $req1);  
                                        while ($all_exo_rows = mysqli_fetch_array($all_exo)) {
                                             echo '<span class="all-date-id"> ' . $all_exo_rows["date"] . '</span><br>';
                                             // echo $echo_date;
                                        }
                         
                         ?>
                        <h5><br>EXO Total:<br><br><?php  echo $num_rows; ?>  </h5>
                        
                </div>
          </div> 
     </div>  
     <?php require 'footer.php'; ?>
      </body>  
 </html>
 
 <!--Formulaire view DATA (select/view)-->
 <div id="dataModalExo" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Exo Details</h4>  
                </div>  
                <div class="modal-body" id="exo_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
 
 <!--Formulaire d'insertion de DATA (add/Update)-->
 <div id="add_data_Modal_Exo" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Ajouter un EXO</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_exo">  
                          <label>Titre</label>  
                             <input type="text" name="titre" id="titre" class="form-control" />  
                          <br />  

                          <label>Language</label>  
                          <select name="language" id="language" class="form-control">  
                               <option value="html">html</option>  
                               <option value="jQuery">jQuery</option>  
                               <option value="javascript">javascript</option>  
                               <option value="wordpress">wordpress</option>  
                               <option value="Bootstrap">Bootstrap</option>  
                               <option value="php">php</option>  
                               <option value="sql">sql</option>  
                          </select>  
                          <br />  

                          <label>Énoncé</label>  
                          <textarea class="form-control" rows="4" cols="50" id="enonce" name="enonce"></textarea>
                          <br />

                          <!-- <label>Statut</label>  
                          <select name="statut" id="statut" class="form-control">  
                               <option value="green">On process or interested</option>  
                               <option value="orange">No Answer</option>  
                               <option value="red">Rejected or refused</option>  
                          </select> 
                          <br />   -->

                          <label>Notes/Remarques</label>  
                          <textarea class="form-control" rows="4" cols="50" id="remarque" name="remarque"></textarea>
                          <br />

                          <label>Source</label>  
                          <input type="text" name="source" id="source" class="form-control" />  
                          <br /> 

                          <label>Link</label>  
                          <input type="text" name="link" id="link" class="form-control" />  
                          <br />  

                          <label>La Note</label>  
                          <input type="text" name="lanote" id="lanote" class="form-control" />  
                          <br />

                          <input type="hidden" name="exo_id" id="exo_id" />  
                          <input type="submit" name="insert" id="insert_exo" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
