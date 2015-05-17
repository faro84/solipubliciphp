<?php
    
    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    // Create connection
    $con = new mysqli($host, $username, $password, $database);

    $data = array();
    
    $sql = "SELECT ANNO, PERIODO, TOTALE, TOTALEPERCITTADINO "
            . "FROM soldipubblici_notebook.nazione_spesatotale_per_mese_per_anno "
            . " ORDER BY ANNO, PERIODO ASC;";
    $result = $con->query($sql);
        
    if( !$result)
        die($con->error);
        
    echo "date,totale" . PHP_EOL;
        
    while($row = $result->fetch_assoc())
    {
        $string = "01-" . $row["PERIODO"] . "-"  .$row["ANNO"] . "," . $row["TOTALE"] . PHP_EOL;
        echo $string;
    }
    $con->close();

