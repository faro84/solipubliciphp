<?php

    //global $conn;
    
    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    // Create connection
    $con = new mysqli($host, $username, $password, $database);

    $data = array();
    //$con = mysqli_connect("localhost","root","root","soldipubblici_notebook") or die("Some error occurred during connection " . mysqli_error($con)); 
    
    if(isset($_GET["cod_rip"])){
        
        $sql = "SELECT COD_REGIONE, TOTALE FROM soldipubblici_notebook.regioni_spesatotale where COD_RIPARTIZIONE = '" . $_GET["cod_rip"] . "';";
        $result = $con->query($sql);
        
        if( !$result)
            die($con->error);
        
        while($row = $result->fetch_object()) 
            $data[] = $row;
        
        echo json_encode($data);
        
    }
    else if($_GET["cod_com"]){
        
        $sql = "SELECT COD_COMUNE, log(convert(totale,unsigned)/100) as TOTALE FROM soldipubblici_notebook.comuni_spesatotale WHERE COD_COMUNE = '" . $_GET["cod_com"] . "' ;";
        $result = $con->query($sql);
        
        if( !$result)
            die($con->error);
        
        while($row = $result->fetch_object()) 
                $data[] = $row;
        
        echo json_encode($data);
    }
    $con->close();
?>
