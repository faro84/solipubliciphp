<?php

    //global $conn;
    
    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    // Create connection
    $con = new mysqli($host, $username, $password, $database);

    $data = array();
    //$con = mysqli_connect("localhost","root","root","soldipubblici_notebook") or die("Some error occurred during connection " . mysqli_error($con)); 

        $sql = "SELECT COD_COMUNE, COD_PROVINCIA, COD_REGIONE, COD_RIPARTIZIONE, TOTALEPERCITTADINO FROM soldipubblici_notebook.comuni_spesatotale;";
        $result = $con->query($sql);
        
        if( !$result)
            die($con->error);
        
        while($row = $result->fetch_assoc()){
            echo str_replace("-", " " , $row["COD_RIPARTIZIONE"]) . "-" . 
                    str_replace("-", " " , $row["COD_REGIONE"]) . "-"  . 
                str_replace("-", " " , $row["COD_PROVINCIA"]) . "-"  . 
                    str_replace("-", " " , $row["COD_COMUNE"]) . "," . floor($row["TOTALEPERCITTADINO"]) . PHP_EOL;
        }
        
    $con->close();
?>
