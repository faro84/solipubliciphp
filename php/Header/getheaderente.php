<?php

    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT cod_comune, cod_provincia, cod_regione "
        ." FROM soldipubblici_notebook.enti_spesatotale"
        ." WHERE enti_spesatotale.cod_ente = '" . $_GET["cod_ente"] . "';";
//    echo $sql;
    $result = $conn->query($sql);
    $comune;
    $provincia;
    $regione;
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) {
            $comune = $row["cod_comune"];
            $provincia = $row["cod_provincia"];
            $regione = $row["cod_regione"];
            break;
        }
    }
    
    $tabella;
    $colonnaout;
    $colonnain;
    $id;
    $link;
    $content;
    if(isset($comune) && $comune != null && $comune != ""){
        $tabella = "anagrafe_comuni";
        $colonnaout = "descr_comune";
        $link = "cod_com";
        $content = "com";
        $colonnain = "cod_comune";
        $id = $comune;
    }
    if(isset($provincia) && $provincia != null && $provincia != ""){
        $tabella = "anag_reg_prov";
        $colonnaout = "descrizione_provincia";
        $link = "cod_prov";
        $content = "prov";
        $colonnain = "cod_provincia";
        $id = $provincia;
    }
    if(isset($regione) && $regione != null && $regione != ""){
        $tabella = "anag_reg_prov";
        $colonnaout = "descrizione_regione";
        $link = "cod_reg";
        $content = "reg";
        $colonnain = "cod_regione";
        $id = $regione;
    }
    $sql2 = "SELECT " . $colonnaout
        . " FROM soldipubblici_notebook." . $tabella
        . " WHERE " . $tabella . "." . $colonnain . " = '" . $id . "' LIMIT 1;";
    //echo $sql2;
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0)
    {
        while($row2 = $result2->fetch_assoc())
        {
            echo "<a href=\"index.php?content=" . $content . "&&" . $link . "=" . $id ."\">" . 
                $row2[$colonnaout] . "</a>";
            break;
        }
    }
    $conn->close();
