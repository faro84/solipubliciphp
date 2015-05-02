<?php
    
    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    // Create connection
    $con = new mysqli($host, $username, $password, $database);

    $data = array();
    //$con = mysqli_connect("localhost","root","root","soldipubblici_notebook") or die("Some error occurred during connection " . mysqli_error($con)); 
    if($_GET["cod_com"]){
        
        $sql = "SELECT ANNO, PERIODO, TOTALE, TOTALEPERCITTADINO FROM soldipubblici_notebook.comune_spesatotale_per_mese_per_anno "
                . "where cod_comune = '" . $_GET["cod_com"] .  "' and cod_provincia = '" . $_GET["cod_prov"] .  "'"
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
        
    }
    $con->close();

