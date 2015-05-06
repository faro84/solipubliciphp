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
        $sql = "SELECT * FROM soldipubblici_notebook.enti_spesatotale "
                . "where cod_comune = '' && cod_provincia= '" . $_GET["cod_prov"] . "' "
                . "ORDER BY TOTALE DESC;";
        echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<a href=\"#\" class=\"list-group-item\">";
                echo "<span class=\"badge\">" . $row["TOTALE"] . "</span>";
                echo "<i class=\"fa fa-fw fa-comment\"></i>" . $row["DESCRIZIONE_ENTE"];
                echo "</a>";
            }
        }
        
        $conn->close();

