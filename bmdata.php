<?php  
 $connect = mysqli_connect("localhost", "root", "", "managit");  
 $query = "SELECT * FROM tbl_client ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Numidia Customers</title>
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
                              <input type="text" id="myInput"  placeholder="Search for names..">
                              <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>  
                              </div>  
                              <br />  
                              <div id="client_table">  
                                   <table class="table table-bordered table-hover" id="myTable">  
                                        <tr>  
                                             <th width="45%">Business Name</th>  
                                             <th width="20%">Téléphone</th> 
                                             <th width="20%">Email</th> 
                                             <th width="5%">Edit</th>  
                                             <th width="5%">View</th>
                                             <th width="5%">Delete</th>
                                        </tr>  
                                        <?php  
                                        while($row = mysqli_fetch_array($result))  
                                        {  
                                        ?>  
                                        <tr>  
                                             <td><?php echo $row["nom"]; ?></td>  
                                             <td><?php echo $row["telephone"]; ?></td> 
                                             <td><?php echo $row["email"]; ?></td> 
                                             <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                             <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                                             <td><a href=" delete.php?idclient=<?php echo $row["id"]; ?> "><input type="button" name="delete" value="Delete" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs delete_data" /></a></td> 
                                        </tr>  
                                        <?php  
                                        }  
                                        ?>  
                                   </table>  
                              </div>  
                         </div> 
                </div>
                <div class="col-md-2 asidediv">
                     <h3>BM DATA PAGE</h3>
                         <p id="aside_text">Oct 9, 2019 - The HTML element represents a multi-line plain-text editing control, 
                         useful when you want to allow users to enter a sizeable amount of free-form text, for example a 
                         comment on a review or feedback form. ... The rows and cols attributes allow you to specify an 
                         exact size for</p>
                </div>
          </div> 
     </div>  
     <?php require 'footer.php'; ?>
      </body>  
 </html>
 
 
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Client Details</h4>  
                </div>  
                <div class="modal-body" id="client_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
 
 
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Add Customers for Numidia</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Business/Nom</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <!-- <label>Address</label>  
                          <textarea name="address" id="address" class="form-control"></textarea>  
                          <br />   -->
                          <label>Type Client</label>  
                          <select name="type_client" id="type_client" class="form-control">  
                               <option value="Serieux">Serieux</option>  
                               <option value="Pas Serieux">Pas serieux</option>  
                          </select>  
                          <br />  
                          <label>Téléphone</label>  
                          <input type="tel" name="telephone" id="telephone" class="form-control" />  
                          <br />  
                          <label>Email</label>  
                          <input type="text" name="email" id="email" class="form-control" />  
                          <br />  
                          <label>Remarque</label>  
                          <textarea class="form-control" rows="4" cols="50" id="remarque" name="remarque"></textarea>
                          <br />
                          <input type="hidden" name="client_id" id="client_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
