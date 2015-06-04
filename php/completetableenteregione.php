<?php

    $start = 0;
    $off = 10;
    if(isset($_GET["start"])){
        $start = $_GET["start"];
        $off = $_GET["off"];
    }
    GetEnteRegioneSpeseTabellaComplete($start, $off);
    
    function GetEnteRegioneSpeseTabellaComplete($start, $end)
    {
        $username = "root"; 
        $password = "root";   
        $host = "localhost";
        $database= "soldipubblici_notebook";

        // Create connection
        $conn = new mysqli($host, $username, $password, $database);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        class TableElementEnte
        {
            public $descrizione;
            public $coddescrizione;
            public $totale;
            public $totalepersona;
            public $anno1;
            public $anno2;
            public $anno3;
        }
        
        $limit = $end;
        $sql = "SELECT cod_ente, totale FROM soldipubblici_notebook.enti_spesatotale" 
                . " WHERE cod_regione = '" . $_GET["cod_reg"] . "'"
                . " AND descrizione_ente LIKE '%REGION%'"
                . " AND descrizione_ente not like '%SANITA%'"
                . " AND descrizione_ente not like '%CONSORZ%'"
                . " AND totale > 0"
                . " LIMIT 1;";
        echo $sql;
        $result = $conn->query($sql);
        $cod_ente_regione;
        if ($result->num_rows > 0)
        {
            while($rowregione = $result->fetch_assoc())
            {
                $cod_ente_regione = $rowregione["cod_ente"];
                break;
            }
        }
        
        if(isset($cod_ente_regione) && $cod_ente_regione != null)
        {
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nr.</th>";
            echo "<th>Descrizione</th>";
            echo "<th>Totale</th>";
            echo "<th>Totale 2013</th>";
            echo "<th>Totale 2014</th>";
            echo "<th>Totale 2015</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $limit = $end;
            $sql = "SELECT * FROM soldipubblici_notebook.enti_spesatotale_per_tipologia" 
                    . " WHERE cod_ente = '" . $cod_ente_regione . "'"
                    . " ORDER BY TOTALE DESC "
                    . " LIMIT " . $limit . " OFFSET " . $start . ";";
            echo $sql;
            $result = $conn->query($sql);
            $tableElements = array();
            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $tableelement = new TableElementEnte();
                    $tableelement->totale = $row["TOTALE"];
                    $tableelement->descrizione = $row['DESCRIZIONE'];
                    $tableelement->coddescrizione = $row['CODDESCRIZIONE'];
                    $tableelement->totalepersona = $row['TOTALEPERCITTADINO'];
                    $tableelement->anno1 = "0";
                    $tableelement->anno2 = "0";
                    $tableelement->anno3 = "0";
                    array_push($tableElements, $tableelement);
                }
            }

            foreach($tableElements as $tableElement)
            {
                $sql2 = "SELECT ANNO, TOTALE FROM soldipubblici_notebook.enti_spesatotale_per_anno_per_tipologia "
                        . "where coddescrizione = '" . $tableElement->coddescrizione ."'"
                        . " and cod_regione = '" . $_GET["cod_reg"] . "';";
    //            echo $sql2;
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0)
                {
                    while($row2 = $result2->fetch_assoc())
                    {
                        if($row2['ANNO'] == "2013"){
                            $tableElement->anno1 = $row2['TOTALE'];
                        }
                        else if($row2['ANNO'] == "2014"){
                            $tableElement->anno2 = $row2['TOTALE'];
                        }
                        else if($row2['ANNO'] == "2015"){
                            $tableElement->anno3 = $row2['TOTALE'];
                        }
                    }
                }
            }

            $index = $start + 1;
            foreach($tableElements as $tableElement)
            {
                echo "<tr>";
                echo "<td>" . $index . "</td>";
                echo "<td><a href=\"index.php?content=ct&&cod_tip=" 
                        . $tableElement->coddescrizione . "\">" 
                        . $tableElement->descrizione . "</a><span class=\"badge\" style=\"float:right\">" 
                        . number_format(floor($tableElement->totalepersona), 0, ",", ".") . "</span></td>";
                echo "<td>" . number_format(floor($tableElement->totale), 0, ",", ".") . "</td>";
                echo "<td>" . number_format(floor($tableElement->anno1), 0, ",", ".") . "</td>";
                echo "<td>" . number_format(floor($tableElement->anno2), 0, ",", ".") . "</td>";
                echo "<td>" . number_format(floor($tableElement->anno3), 0, ",", ".") . "</td>";
                echo "</tr>";

                $index++;
            }

            $conn->close();
            echo "</tbody>";    
        }
        
    }

