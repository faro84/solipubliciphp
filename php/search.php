<?php
    //header("Content-type: application/json");
    //require_once 'connection.php';

    $username = "root"; 
    $password = "root";   
    $host = "localhost";
    $database= "soldipubblici_notebook";
    
    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    //echo $host;
    
    if($_GET['type'] == 'country')
    {
        $sql = "SELECT COD_COMUNE, COD_PROVINCIA, DESCR_COMUNE FROM soldipubblici_notebook.anagrafe_comuni where DESCR_COMUNE LIKE '%".strtoupper($_GET['name_startsWith'])."%'";
        
	$result = $conn->query($sql);	
        
        if( !$result)
            die($conn->error);
        
	$data = array();
        while($row = $result->fetch_assoc())
            array_push($data, $row);
        
	echo json_encode($data);
}

?>

