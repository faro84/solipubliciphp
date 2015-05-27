<?php
    
    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    // Create connection
    $con = new mysqli($host, $username, $password, $database);

    $data = array();
    //$con = mysqli_connect("localhost","root","root","soldipubblici_notebook") or die("Some error occurred during connection " . mysqli_error($con)); 
    
        $sql = "SELECT descrizione_regione, totale,regioni_spesatotale.cod_regione"
            . " FROM soldipubblici_notebook.regioni_spesatotale "
            . " JOIN soldipubblici_notebook.anag_reg_prov"
            . " ON anag_reg_prov.cod_regione = regioni_spesatotale.cod_regione"
            . " GROUP BY descrizione_regione"
            . " ORDER BY totale DESC;";
        $result = $con->query($sql);
        
        if( !$result)
            die($con->error);
        
        echo "regione,totale,codregione" . PHP_EOL;
        
        while($row = $result->fetch_assoc())
        {
            $string = $row["descrizione_regione"] . "," . $row["totale"] . "," . $row["cod_regione"] . PHP_EOL;
            echo $string;
        }
        
    $con->close();