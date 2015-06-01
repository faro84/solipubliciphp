<?php

    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);
        
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
        
    $limit = $end;
    $sql = "SELECT TOTALE,DESCRIZIONE_ENTE,COD_ENTE FROM soldipubblici_notebook.enti_spesatotale "
            . "where cod_comune = '' && cod_provincia= '' "
            . "&& cod_regione= '" . $_GET["cod_reg"] . "'"
            . " and totale != '0'"
            . "ORDER BY totale DESC;";
    //echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<a href=\"index.php?content=ente&&cod_ente=" . $row["COD_ENTE"] . "\" class=\"list-group-item\">";
            echo "<span class=\"badge\">" . number_format(floor($row["TOTALE"]), 0, ",", ".") . "</span>";
            echo "<i class=\"fa fa-fw fa-comment\"></i>" . $row["DESCRIZIONE_ENTE"];
            echo "</a>";
        }
    }
        
    $conn->close();