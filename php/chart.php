<?php

    //global $conn;
    
    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    $data = array();
    //$con = mysqli_connect("localhost","root","root","soldipubblici_notebook") or die("Some error occurred during connection " . mysqli_error($con)); 
    $sql = "SELECT COD_COMUNE, log(convert(totale,unsigned)/100) as TOTALE FROM soldipubblici_notebook.comuni_totalespese order by convert(totale,unsigned) desc limit 30;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data);
?>
