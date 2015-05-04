<?php

    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT descrizione_regione, cod_regione, ripart_geo 
        FROM soldipubblici_notebook.anagrafe_comuni join soldipubblici_notebook.anag_reg_prov 
        on anagrafe_comuni.cod_provincia = anag_reg_prov.cod_provincia 
        where anagrafe_comuni.cod_regione='" . $_GET["cod_reg"] . "';";
    //echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) {
            echo "<a href=\"index.php?content=rip&&cod_rip=" . $row["ripart_geo"] ."\">" . 
                $row["ripart_geo"] ."</a>" . " // " .
                $row["descrizione_regione"];
            break;
        }
    }
    $conn->close();

