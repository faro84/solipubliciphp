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
    
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nr.</th>";
    echo "<th>Ente</th>";
    echo "<th>Totale</th>";
    echo "<th>Totale 2013</th>";
    echo "<th>Totale 2014</th>";
    echo "<th>Totale 2015</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    $start = 0;
    $off = 10;
    if(isset($_GET["start"]))
    {
        $start = $_GET["start"];
        $off = $_GET["off"];
    }
    $limit = $off;
        
    if(isset($_GET["content"]) && $_GET["content"] == "overview_reg")
    {  
        $sql = "SELECT * FROM soldipubblici_notebook.enti_spesatotale "
            . " WHERE cod_comune = '' AND cod_provincia= '' "
            . " ORDER BY TOTALE DESC"
            . " LIMIT " . $off . " OFFSET " . $start . " ;";
    }
    else
    {
        $limit = $end;
        $sql = "SELECT * FROM soldipubblici_notebook.enti_spesatotale "
            . " WHERE cod_comune = '" . $_GET["cod_com"] . "' AND cod_provincia= '" . $_GET["cod_prov"] . "' "
            . " ORDER BY TOTALE DESC;";
    }
    echo $sql;
    $result = $conn->query($sql);
    $index = $start + 1;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row["TOTALE"] != "0")
            {
//                echo "<a href=\"#\" class=\"list-group-item\">";
//                echo "<span class=\"badge\">" . $row["TOTALE"] . "</span>";
//                echo "<i class=\"fa fa-fw fa-comment\"></i>" . $row["DESCRIZIONE_ENTE"];
//                echo "</a>";
//                echo "<tr>";
            echo "<td>" . $index . "</td>";
            echo "<td><a href=index.php?content=ente&&cod_ente=" 
                . $row["COD_ENTE"] . ">" . $row["DESCRIZIONE_ENTE"] . "</a><span class=\"badge\" style=\"float:right\">" 
                . number_format(floor($row["TOTALE"]), 0, ",", ".") . "</span></td>";
            echo "<td>" . number_format(floor(0), 0, ",", ".") . "</td>";
            echo "<td>" . number_format(floor(0), 0, ",", ".") . "</td>";
            echo "<td>" . number_format(floor(0), 0, ",", ".") . "</td>";
            echo "<td>" . number_format(floor(0), 0, ",", ".") . "</td>";
            echo "</tr>";
            $index++;
            }
        }
    }
    
    echo "</tbody>";
    $conn->close();