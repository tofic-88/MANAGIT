<?php
	
	require "connexion.php"; 
		

	if(isset($_GET['idclient'])){
			$idclient = $_REQUEST['idclient'];

	try {
		
	    // sql to delete a record
	    $sql = "DELETE FROM tbl_client  WHERE id ='$idclient'";

	    // use exec() because no results are returned
	    $conn->exec($sql);
	    header("location:bmdata.php#client_table");
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "Error <br>" . $e->getMessage();
	    }

		}
		
		elseif(isset($_GET['idposte'])){
			$idposte = $_REQUEST['idposte'];

	try {
		
	    // sql to delete a record
	    $sql = "DELETE FROM re  WHERE id ='$idposte'";

	    // use exec() because no results are returned
	    $conn->exec($sql);
	    header("location:re.php#poste_table");
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "Error <br>" . $e->getMessage();
	    }

		}

		elseif(isset($_GET['idexo'])){
			$idexo = $_REQUEST['idexo'];

	try {
		
	    // sql to delete a record
	    $sql = "DELETE FROM exo  WHERE id ='$idexo'";

	    // use exec() because no results are returned
	    $conn->exec($sql);
	    header("location:exo.php#exo_table");
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "Error <br>" . $e->getMessage();
	    }

		}
        
        else{
			echo "No Enter";
		}


?>