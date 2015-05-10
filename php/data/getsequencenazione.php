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

        $sql = "SELECT COD_RIPARTIZIONE, TOTALEPERCITTADINO,"
                . "DESCRIZIONE_PROVINCIA, DESCRIZIONE_REGIONE "
                . "FROM soldipubblici_notebook.province_spesatotale " 
                . "join soldipubblici_notebook.anag_reg_prov on " 
                . "province_spesatotale.cod_provincia = anag_reg_prov.cod_provincia;";
        $result = $con->query($sql);
        
        if( !$result)
            die($con->error);
        
        while($row = $result->fetch_assoc()){
            echo str_replace("-", " " , $row["COD_RIPARTIZIONE"]) . "-" . 
                    str_replace("-", " " , $row["DESCRIZIONE_REGIONE"]) . "-"  . 
                str_replace("-", " " , $row["DESCRIZIONE_PROVINCIA"]) . "," . floor($row["TOTALEPERCITTADINO"]) . PHP_EOL;
        }
        
    $con->close();
?>
