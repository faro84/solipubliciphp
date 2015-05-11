<?php

    $start = 0;
    $off = 30;
    if(isset($_GET["start"])){
        $start = $_GET["start"];
        $off = $_GET["off"];
        $cod_com = $_GET["cod_com"];
        $cod_prov = $_GET["cod_prov"];
    }
    ListaComuniPerSpesaPerTipologiaPerAnno($start, $off);
    
    function ListaComuniPerSpesaPerTipologiaPerAnno($start, $end)
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
            public $descrizionespesa;
            public $cod_com;
            public $cod_prov;
            public $anno1;
            public $anno2;
            public $anno3;
        }
        
        $limit = $end;
        $sql = "SELECT descr_comune, totale, totalepercittadino, descrizione,
                comuni_spesatotale_per_tipologia.cod_comune, comuni_spesatotale_per_tipologia.cod_provincia
                FROM soldipubblici_notebook.comuni_spesatotale_per_tipologia 
                join soldipubblici_notebook.anagrafe_comuni on 
                comuni_spesatotale_per_tipologia.cod_comune = anagrafe_comuni.cod_comune and 
                comuni_spesatotale_per_tipologia.cod_provincia = anagrafe_comuni.cod_provincia
                where comuni_spesatotale_per_tipologia.cod_comune = " . $_GET["cod_com"] . " and comuni_spesatotale_per_tipologia.cod_provincia = " . $_GET["cod_prov"] . "
                order by comuni_spesatotale_per_tipologia.totale desc LIMIT " . $limit . " OFFSET " . $start . ";";
        //echo $sql;
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
                $tableelement->descrizionespesa = $row['descrizione'];
                $tableelement->anno1 = "0";
                $tableelement->anno2 = "0";
                $tableelement->anno3 = "0";
                array_push($tableElements, $tableelement);
            }
        }
        
        foreach($tableElements as $tableElement)
        {
            $sql2 = "SELECT * FROM soldipubblici_notebook.comuni_spesatotale_per_anno_per_tipologia "
                    . "where cod_comune = '" . $tableElement->cod_com . "' && "
                    . "cod_provincia= '" . $tableElement->cod_prov . "' and"
                    . " descrizione = '" . $tableElement->descrizionespesa . "';";
            
            //echo $sql2 . PHP_EOL;
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
        
        foreach($tableElements as $tableElement)
        {
            echo "<tr>";
            echo "<td>1</td>";
            echo "<td>" . $tableElement->descrizionespesa . "<span class=\"badge\" style=\"float:right\">" . $tableElement->descrizionespesa . "</span></td>";
            echo "<td>" . $tableElement->totale . "</td>";
            echo "<td>" . $tableElement->anno1 . "</td>";
            echo "<td>" . $tableElement->anno2 . "</td>";
            echo "<td>" . $tableElement->anno3 . "</td>";
            echo "</tr>";
        }
        
        $conn->close();
        echo "</tbody>";
    }

