<?php

        $username = "root"; 
        $password = "root";   
        $host = "localhost";
        $database= "soldipubblici_notebook";

        // Create connection
        $conn = new mysqli($host, $username, $password, $database);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $limit = $end;
        $sql = "SELECT descr_comune, totale,anagrafe_comuni.cod_comune,anagrafe_comuni.cod_provincia  FROM soldipubblici_notebook.comuni_spesatotale 
                join soldipubblici_notebook.anagrafe_comuni on 
                comuni_spesatotale.cod_comune = anagrafe_comuni.cod_comune and 
                comuni_spesatotale.cod_provincia = anagrafe_comuni.cod_provincia
                order by comuni_spesatotale.totale desc limit 10;";
        //echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<a href=index.php?content=com&&cod_com=" . $row["cod_comune"] . "&&cod_prov=" . 
                        $row["cod_provincia"] . " class=\"list-group-item\">";
                echo "<span class=\"badge\">" . $row["totale"] . "</span>";
                echo "<i class=\"fa fa-fw fa-comment\"></i>" . $row["descr_comune"];
                echo "</a>";
            }
        }
        
        $conn->close();

