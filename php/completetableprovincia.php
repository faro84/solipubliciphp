<?php

    $start = 0;
    $off = 10;
    if(isset($_GET["start"])){
        $start = $_GET["start"];
        $off = $_GET["off"];
        $cod_prov = $_GET["cod_prov"];
    }
    GetProvinciaSpeseTabellaComplete($start, $off);
    
    function GetProvinciaSpeseTabellaComplete($start, $end)
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
            public $descrizione;
            public $totale;
            public $totalepersona;
            public $anno1;
            public $anno2;
            public $anno3;
            public $anno4;
            public $codcomune;
        }
        
        $limit = $end;
        $sql = "SELECT * FROM soldipubblici_notebook.comuni_spesatotale " .
                "where cod_provincia= '" . $_GET["cod_prov"] . 
                "' ORDER BY TOTALE DESC LIMIT " . $limit . " OFFSET " . $start . ";";
        //echo $sql;
        $result = $conn->query($sql);
        $tableElements = array();
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $tableelement = new TableElement();
                $tableelement->codcomune = $row["COD_COMUNE"];
                $tableelement->totale = $row["TOTALE"];
                $tableelement->totalepersona = $row['TOTALEPERCITTADINO'];
                $tableelement->anno1 = "0";
                $tableelement->anno2 = "0";
                $tableelement->anno3 = "0";
                $tableelement->anno4 = "0";
                array_push($tableElements, $tableelement);
            }
        }
        
        foreach($tableElements as $tableElement)
        {
            $sql2 = "SELECT * FROM soldipubblici_notebook.comuni_spesatotale_per_anno "
                    . "where cod_comune = '" . $tableElement->codcomune . "' and "
                    . "cod_provincia= '" . $_GET["cod_prov"] . "';";
            //echo $sql2;
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0)
            {
                while($row2 = $result2->fetch_assoc())
                {
                    if($row2['ANNO'] == "2012"){
                        $tableElement->anno1 = $row2['TOTALE'];
                    }
                    if($row2['ANNO'] == "2013"){
                        $tableElement->anno2 = $row2['TOTALE'];
                    }
                    else if($row2['ANNO'] == "2014"){
                        $tableElement->anno3 = $row2['TOTALE'];
                    }
                    else if($row2['ANNO'] == "2015"){
                        $tableElement->anno4 = $row2['TOTALE'];
                    }
                }
            }
        }
        $index = 1;
        foreach($tableElements as $tableElement)
        {
            echo "<tr>";
            echo "<td>" . $index . "</td>";
            echo "<td>" . $tableElement->codcomune . "</td>";
            echo "<td>" . $tableElement->totale . "</td>";
            echo "<td>" . $tableElement->anno2 . "</td>";
            echo "<td>" . $tableElement->anno3 . "</td>";
            echo "<td>" . $tableElement->anno4 . "</td>";
            echo "</tr>";
            $index++;
        }
        
        $conn->close();
        echo "</tbody>";
    }

