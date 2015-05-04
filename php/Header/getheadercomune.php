<?php

    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT descr_comune, descrizione_provincia, descrizione_regione, cod_regione, ripart_geo 
        FROM soldipubblici_notebook.anagrafe_comuni join soldipubblici_notebook.anag_reg_prov 
        on anagrafe_comuni.cod_provincia = anag_reg_prov.cod_provincia where anagrafe_comuni.cod_comune = '" 
        . $_GET["cod_com"] . "' and anagrafe_comuni.cod_provincia='" . $_GET["cod_prov"] . "';";
    //echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) {
            echo "<a href=\"index.php?content=rip&&cod_rip=" . $row["ripart_geo"] ."\">" . 
                $row["ripart_geo"] ."</a>" . " // ". 
                "<a href=\"index.php?content=reg&&cod_reg=" . $row["cod_regione"] ."\">" . 
                $row["descrizione_regione"] ."</a>" . " // ". 
                "<a href=\"index.php?content=prov&&cod_prov=" . $_GET["cod_prov"] ."\">" . 
                $row["descrizione_provincia"] ."</a>" . " // ". 
                $row["descr_comune"];
        }
    }
    $conn->close();

