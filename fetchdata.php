<?php
    // DONT WORK ANY WHERE RIGHT NOW
    # connect to DataBase
    $host = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $db = "jsfc8h";
    
    // Create connection
    $conn = new mysqli($host, $dbUserName, $dbPassword, $db);
    $display_all = "SELECT * FROM challenge_5";
    $query_run = mysqli_query($conn, $display_all);


    
    echo "<table class='table table-dark table-hover website-table'>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>";

    if ($query_run) {
        while($row = mysqli_fetch_array($query_run))
        {
        echo"         
            <tr>
                <td>$row[nom] </td>
                <td>$row[email] </td>
                <td>$row[mdp] </td>
                <td><a href='delete.php?emailregister=$row[email]'><img src='images/cross.png'></a></td>
            </tr>
            ";}
    }else {
        echo "No Data from Database";
    }
    echo "</tbody></table>";
    $conn->close();
?>