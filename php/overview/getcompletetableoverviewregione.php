<?php

    $start = 0;
    $off = 10;
    if(isset($_GET["start"])){
        $start = $_GET["start"];
        $off = $_GET["off"];
    }
    GetRegioniSpeseTabellaComplete($start, $off);
    
    function GetRegioniSpeseTabellaComplete($start, $end)
    {
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nr.</th>";
        echo "<th>Descrizione</th>";
        echo "<th>Media</th>";
        echo "<th>Max</th>";
        echo "<th>Min</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        $username = "root"; 
        $password = "root";   
        $host = "localhost";
        $database= "soldipubblici_notebook";

        // Create connection
        $conn = new mysqli($host, $username, $password, $database);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        class TableElement
        {
            public $codice_tipologia;
            public $descrizione_tipologia;
            public $regione_max;
            public $regione_min;
            public $media;
        }
        
        $limit = $end;
        $sql = "SELECT coddescrizione, descrizione, media" 
                . " FROM soldipubblici_notebook.regioni_mediaspesatotale_per_tipologia"
                . " ORDER BY media DESC "
                . " LIMIT " . $limit . " OFFSET " . $start . ";";
//        echo $sql;
        $result = $conn->query($sql);
        $tableElements = array();
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $tableelement = new TableElement();
                $tableelement->codice_tipologia = $row["coddescrizione"];
                $tableelement->descrizione_tipologia = $row['descrizione'];
                $tableelement->media = $row['media'];
                array_push($tableElements, $tableelement);
            }
        }
        
        foreach($tableElements as $tableElement)
        {
            $sql2 = "SELECT descrizione_regione, totale" 
                    . " FROM soldipubblici_notebook.regioni_spesatotale_per_tipologia "
                    . " JOIN soldipubblici_notebook.anag_reg_prov"
                    . " ON anag_reg_prov.cod_regione = regioni_spesatotale_per_tipologia.cod_regione"
                    . " WHERE coddescrizione = '" . $tableElement->codice_tipologia ."'"
                    . " GROUP BY anag_reg_prov.cod_regione"
                    . " ORDER BY totale DESC LIMIT 1;";
//                    . " ORDER BY totale;";
//            echo $sql2 . PHP_EOL;
            $result2 = $conn->query($sql2);
//            echo $result2->num_rows. PHP_EOL;
            if ($result2->num_rows > 0)
            {
                while($row2 = $result2->fetch_assoc())
                {
//                    echo $row2["descrizione_regione"];
                    $tableElement->regione_max = $row2["descrizione_regione"];
                    break;
                }
            }
        }
        
        foreach($tableElements as $tableElement)
        {
            $sql2 = "SELECT descrizione_regione, totale" 
                    . " FROM soldipubblici_notebook.regioni_spesatotale_per_tipologia "
                    . " JOIN soldipubblici_notebook.anag_reg_prov"
                    . " ON anag_reg_prov.cod_regione = regioni_spesatotale_per_tipologia.cod_regione"
                    . " WHERE coddescrizione = '" . $tableElement->codice_tipologia ."'"
                    . " GROUP BY anag_reg_prov.cod_regione"
                    . " ORDER BY totale ASC LIMIT 1;";
//                    . " ORDER BY totale;";
//            echo $sql2 . PHP_EOL;
            $result2 = $conn->query($sql2);
//            echo $result2->num_rows. PHP_EOL;
            if ($result2->num_rows > 0)
            {
                while($row2 = $result2->fetch_assoc())
                {
//                    echo $row2["descrizione_regione"];
                    $tableElement->regione_min = $row2["descrizione_regione"];
                    break;
                }
            }
        }
        
        $index = $start + 1;
        foreach($tableElements as $tableElement)
        {
            echo "<tr>";
            echo "<td>" . $index . "</td>";
            echo "<td><a href=\"index.php?content=ct&&cod_tip=" 
                    . $tableElement->codice_tipologia . "\">" 
                    . $tableElement->descrizione_tipologia . "</a></td>";
            echo "<td>" . number_format(floor($tableElement->media), 0, ",", ".") . "</td>";
            echo "<td>" . $tableElement->regione_max . "</td>";
            echo "<td>" . $tableElement->regione_min . "</td>";
            echo "</tr>";
            
            $index++;
        }
        
        $conn->close();
        echo "</tbody>";
    }
