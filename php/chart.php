<?php

    global $conn;
    
    
    $data = array();
    
     $hostname = "localhost";
    $dbusername = "root";
    $dbname = "soldipubblici_notebook";
    $dbpassword = "root";
    $link = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname); 
    if (!$link) { 
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error()); 
    }

    $sql = "SELECT * FROM soldipubblici_notebook.comuni_totalespese limit 100";

    $result = $link->query($sql);
    if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    //$content = $content . $row["COD_COMUNE"] . " " . $row["TOTALE"] . PHP_EOL;
                    //echo $output;
                    $data[] = $row;
                }
            }
//    if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        }
//        else{
//    $result = $conn->query($sql);
////            //$output = " name value" . PHP_EOL;
////            //$content = "";
//            if ($result->num_rows > 0)
//            {
//                $index = 0;
//                while($row = $result->fetch_assoc())
//                {
//                    if($index >= 3)
//                        break;
//                    //$content = $content . $row["COD_COMUNE"] . " " . $row["TOTALE"] . PHP_EOL;
//                    //echo $output;
//                    $data[] = $row;
//                    $index = $index + 1;
//                }
//            }
//            //$output = $output . $content;        
//        }
    
    echo json_encode($data);
    
//    if ($result->num_rows > 0) {
//            // output data of each row
//            while($row = $result->fetch_assoc()) {
//                //$data[] = $row;
//                echo "id: " . $row["COD_COMUNE"]. "<br>";
//            }
//        }
   
//    for ($x = 0; $x < mysql_num_rows($query); $x++) {
//        $data[] = mysql_fetch_assoc($query);
//    }
    
    //echo file_get_contents("assets/data/chart.json");
    //$json_string = "../assets/data/simplechart.json";
    //$jsondata = file_get_contents($json_string);
    //echo $jsondata;
    //
    //
    //echo "{\"items\": [{ \"label\": \"apples\",\"n\": 15 },{\"label\": \"oranges\",\"n\": 30},{\"label\": \"bananas\",\"n\": 10},{\"label\": \"plums\",\"n\": 5}]}";
    
    //
//    $data2 = array( "name" => "value", "value" => "value");
//    $data = 
//            array( array ( "name" => "value",
//    "Jan" => 46, "Feb" => 50, "Mar" => 53, "Apr" => 58,
//    "May" => 64, "Jun" => 70));
//    $titleArray = array_keys($data2);
//    $delimiter = "\t";
//
//  
//    //Separate each column title name with the delimiter
//    $titleString = implode($delimiter, $titleArray);
//    //echo $titleString . "\r\n";
//  
//    //Loop through each subarray, which are our data sets
//    foreach ($data as $subArrayKey => $subArray) {
//        //Separate each datapoint in the row with the delimiter
//        $dataRowString = implode($delimiter, $subArray);
//        //echo $dataRowString . "\r\n";
//    }
    
    //echo "name \t value\rFamily in feud with Zuckerbergs \t .17"; 
    //echo "name;value\r\nFamily in feud with Zuckerbergs;.17\r\nCommitted 671 birthdays to memory;.19";
    //echo "Family in feud with Zuckerbergs\t.17\r\n";
    //utf8_encode($string);
    //echo $string;
    //echo "Committed 671 birthdays to memory	.19";
    

    //$obj = json_decode($jsondata,true);
 
    //echo($jsondata);
    //echo "[{\"label\":\"1990\", \"value\":16}]";
//        {"label":"1991", "value":56}, 
//        {"label":"1992", "value":7},
//        {"label":"1993", "value":60},
//        {"label":"1994", "value":22}
        
    // echo $output;
    //echo "ciao";
?>
