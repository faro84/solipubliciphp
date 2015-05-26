<?php

    $start = 0;
    $off = 30;
    if(isset($_GET["start"])){
        $start = $_GET["start"];
        $off = $_GET["off"];
    }
    ListaComuniPerSpesa($start, $off);
    
    function ListaComuniPerSpesa($start, $end)
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
            public $cod_com;
            public $cod_prov;
            public $anno1;
            public $anno2;
            public $anno3;
        }
        
        $limit = $end;
        
        if(isset($_GET["cod_prov"]))
        {
            $sql = "SELECT descr_comune, totale, totalepercittadino, "
                    . " comuni_spesatotale.cod_comune, comuni_spesatotale.cod_provincia"
                    . " FROM soldipubblici_notebook.comuni_spesatotale "
                    . " JOIN soldipubblici_notebook.anagrafe_comuni ON "
                    . " comuni_spesatotale.cod_comune = anagrafe_comuni.cod_comune AND "
                    . " comuni_spesatotale.cod_provincia = anagrafe_comuni.cod_provincia"
                    . " AND comuni_spesatotale.cod_provincia = '" . $_GET["cod_prov"] . "'"
                    . " ORDER BY comuni_spesatotale.totalepercittadino DESC "
                    . " LIMIT " . $limit . " OFFSET " . $start . ";";
        }
        elseif (isset($_GET["cod_reg"]))
        {
            $sql = "SELECT descr_comune, totale, totalepercittadino, "
                    . " comuni_spesatotale.cod_comune, comuni_spesatotale.cod_provincia"
                    . " FROM soldipubblici_notebook.comuni_spesatotale "
                    . " JOIN soldipubblici_notebook.anagrafe_comuni ON "
                    . " comuni_spesatotale.cod_comune = anagrafe_comuni.cod_comune AND "
                    . " comuni_spesatotale.cod_provincia = anagrafe_comuni.cod_provincia"
                    . " WHERE comuni_spesatotale.cod_regione = '" . $_GET["cod_reg"] . "' "
                    . " ORDER BY comuni_spesatotale.totalepercittadino DESC "
                    . " LIMIT " . $limit . " OFFSET " . $start . ";";
        }
        elseif (isset($_GET["cod_rip"]))
        {
            $sql = "SELECT descr_comune, totale, totalepercittadino, "
                    . " comuni_spesatotale.cod_comune, comuni_spesatotale.cod_provincia"
                    . " FROM soldipubblici_notebook.comuni_spesatotale "
                    . " JOIN soldipubblici_notebook.anagrafe_comuni ON "
                    . " comuni_spesatotale.cod_comune = anagrafe_comuni.cod_comune AND "
                    . " comuni_spesatotale.cod_provincia = anagrafe_comuni.cod_provincia"
                    . " WHERE comuni_spesatotale.cod_ripartizione = '" . $_GET["cod_rip"] . "' "
                    . " ORDER BY comuni_spesatotale.totalepercittadino DESC "
                    . " LIMIT " . $limit . " OFFSET " . $start . ";";
        }
        else
        {
            $sql = "SELECT descr_comune, totale, totalepercittadino, "
                    . " comuni_spesatotale.cod_comune, comuni_spesatotale.cod_provincia"
                    . " FROM soldipubblici_notebook.comuni_spesatotale "
                    . " JOIN soldipubblici_notebook.anagrafe_comuni ON "
                    . " comuni_spesatotale.cod_comune = anagrafe_comuni.cod_comune AND "
                    . " comuni_spesatotale.cod_provincia = anagrafe_comuni.cod_provincia"
                    . " ORDER BY comuni_spesatotale.totalepercittadino DESC "
                    . " LIMIT " . $limit . " OFFSET " . $start . ";";
        }
        
//        echo $sql;
        $result = $conn->query($sql);
        $tableElements = array();
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $tableelement = new TableElement();
                $tableelement->totale = $row["totale"];
                $tableelement->cod_com = $row["cod_comune"];
                $tableelement->cod_prov = $row["cod_provincia"];
                $tableelement->descrizione = $row['descr_comune'];
                $tableelement->totalepersona = $row['totalepercittadino'];
                $tableelement->anno1 = "0";
                $tableelement->anno2 = "0";
                $tableelement->anno3 = "0";
                array_push($tableElements, $tableelement);
            }
        }
        
        foreach($tableElements as $tableElement)
        {
            $sql2 = "SELECT ANNO,TOTALEPERCITTADINO FROM soldipubblici_notebook.comuni_spesatotale_per_anno "
                    . "where cod_comune = '" . $tableElement->cod_com . "' && "
                    . "cod_provincia= '" . $tableElement->cod_prov . "';";
//            echo $sql2;
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0)
            {
                while($row2 = $result2->fetch_assoc())
                {
                    if($row2['ANNO'] == "2013"){
                        $tableElement->anno1 = $row2['TOTALEPERCITTADINO'];
                    }
                    else if($row2['ANNO'] == "2014"){
                        $tableElement->anno2 = $row2['TOTALEPERCITTADINO'];
                    }
                    else if($row2['ANNO'] == "2015"){
                        $tableElement->anno3 = $row2['TOTALEPERCITTADINO'];
                    }
                }
            }
        }
        
        $index = $start + 1;
        foreach($tableElements as $tableElement)
        {
            echo "<tr>";
            echo "<td>" . $index . "</td>";
            echo "<td><a href=index.php?content=com&&cod_com=" 
                . $tableElement->cod_com . "&&cod_prov=" . $tableElement->cod_prov  
                . ">" . $tableElement->descrizione . "</a><span class=\"badge\" style=\"float:right\">" 
                . number_format(floor($tableElement->totalepersona), 0, ",", ".") . "</span></td>";
            echo "<td>" . number_format(floor($tableElement->totalepersona), 0, ",", ".") . "</td>";
            echo "<td>" . number_format(floor($tableElement->anno1), 0, ",", ".") . "</td>";
            echo "<td>" . number_format(floor($tableElement->anno2), 0, ",", ".") . "</td>";
            echo "<td>" . number_format(floor($tableElement->anno3), 0, ",", ".") . "</td>";
            echo "</tr>";
            $index++;
        }
        
        $conn->close();
        echo "</tbody>";
    }