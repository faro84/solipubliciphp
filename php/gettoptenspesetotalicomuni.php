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
      
    $start = 0;
    $off = 10;
    if(isset($_GET["start"])){
        $start = $_GET["start"];
        $off = $_GET["off"];
    }
    $limit = $off;
    
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nr.</th>";
    echo "<th>Descrizione</th>";
    echo "<th>Totale</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    if(isset($_GET["cod_reg"]) && isset($_GET["cod_prov"]))
    {
        $sql = "SELECT descr_comune, totale,anagrafe_comuni.cod_comune,anagrafe_comuni.cod_provincia "
            . "FROM soldipubblici_notebook.comuni_spesatotale "
            . "join soldipubblici_notebook.anagrafe_comuni on "
            . "comuni_spesatotale.cod_comune = anagrafe_comuni.cod_comune and "
            . "comuni_spesatotale.cod_provincia = anagrafe_comuni.cod_provincia "
            . "where comuni_spesatotale.cod_regione = '" . $_GET["cod_reg"] . "'" 
            . "and comuni_spesatotale.cod_provincia = '" . $_GET["cod_prov"] . "'"
            . "order by comuni_spesatotale.totale desc "
            . " LIMIT " . $limit . " OFFSET " . $start . ";";
    }
    elseif (isset($_GET["cod_reg"])) {
        $sql = "SELECT descr_comune, totale,anagrafe_comuni.cod_comune,anagrafe_comuni.cod_provincia 
            FROM soldipubblici_notebook.comuni_spesatotale 
            join soldipubblici_notebook.anagrafe_comuni on 
            comuni_spesatotale.cod_comune = anagrafe_comuni.cod_comune and 
            comuni_spesatotale.cod_provincia = anagrafe_comuni.cod_provincia 
            where comuni_spesatotale.cod_regione = '" . $_GET["cod_reg"] . "' 
            order by comuni_spesatotale.totale desc "
            . " LIMIT " . $limit . " OFFSET " . $start . ";";
    }
    else{
        $sql = "SELECT descr_comune, totale,anagrafe_comuni.cod_comune,anagrafe_comuni.cod_provincia 
            FROM soldipubblici_notebook.comuni_spesatotale 
            join soldipubblici_notebook.anagrafe_comuni on 
            comuni_spesatotale.cod_comune = anagrafe_comuni.cod_comune and 
            comuni_spesatotale.cod_provincia = anagrafe_comuni.cod_provincia
            order by comuni_spesatotale.totale desc "
            . " LIMIT " . $limit . " OFFSET " . $start . ";";
    }
    //echo $sql;
    $result = $conn->query($sql);
    $index = $start + 1;
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
//            echo "<a href=index.php?content=com&&cod_com=" . $row["cod_comune"] . "&&cod_prov=" . 
//                    $row["cod_provincia"] . " class=\"list-group-item\">";
//            echo "<span class=\"badge\">" . number_format(floor($row["totale"]), 0, ",", ".") . "</span>";
//            echo "<i class=\"fa fa-fw fa-comment\"></i>" . $row["descr_comune"];
//            echo "</a>";
            
            echo "<tr>";
            echo "<td>" . $index . "</td>";
            echo "<td><a href=index.php?content=com&&cod_com=" . $row["cod_comune"] . "&&cod_prov=" . 
                    $row["cod_provincia"] .">". $row["descr_comune"] . "</a></td>";
            echo "<td>" . number_format(floor($row["totale"]), 0, ",", ".") . "</td>";
            echo "</tr>";
            $index++;
        }
    }
      
    $conn->close();
    echo "</tbody>";