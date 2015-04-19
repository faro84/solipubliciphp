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
    
    $ripartizioni = "SELECT RIPART_GEO FROM soldipubblici_notebook.anag_reg_prov GROUP BY RIPART_GEO;";
    
    $comuni_sql = "SELECT * FROM soldipubblici_notebook.anagrafe_comuni;";
    
    $myfile = fopen("sidemenu.php", "w") or die("Unable to open file!");
    $txt = "<?php " . PHP_EOL;
    fwrite($myfile, $txt);
    $txt = "echo \"<a href=\\\"#\\\"><i class=\\\"fa fa-sitemap\\\"></i> Multi-Level Dropdown<span class=\\\"fa arrow\\\"></span></a>\";" . PHP_EOL;
    fwrite($myfile, $txt);
    $txt = "echo \"<ul class=\\\"nav nav-second-level\\\">\";" . PHP_EOL;
    fwrite($myfile, $txt);
    
    $result = $link->query($ripartizioni);
    if ($result->num_rows > 0)
    {
                while($row = $result->fetch_assoc())
                {
                    $regioni_sql = "SELECT COD_REGIONE, DESCRIZIONE_REGIONE, RIPART_GEO from soldipubblici_notebook.anag_reg_prov "
                            . "WHERE RIPART_GEO='" . $row["RIPART_GEO"] . "'  GROUP BY COD_REGIONE;";
                    $result_regioni = $link->query($regioni_sql);
                    if ($result_regioni->num_rows > 0)
                    {
                        $txt = "echo \"<li>\";" . PHP_EOL;
                        fwrite($myfile, $txt);
                        $txt = "echo \"<a href=\\\"php/ripartizione_geografica.php?cod_rip=". $row["RIPART_GEO"] ."\\\">" . $row["RIPART_GEO"] . "<span class=\\\"fa arrow\\\"></span></a>\";" . PHP_EOL;
                        fwrite($myfile, $txt);
                        $txt = "echo \"<ul class=\\\"nav nav-third-level\\\">\";" . PHP_EOL;
                        fwrite($myfile, $txt);
                        while($row_regioni = $result_regioni->fetch_assoc())
                        {
                            $provincie_sql = "SELECT COD_PROVINCIA, DESCRIZIONE_PROVINCIA, COD_REGIONE FROM soldipubblici_notebook.anag_reg_prov WHERE "
                                    . "COD_REGIONE='" . $row_regioni["COD_REGIONE"]  . "';";
                            $result_provincie = $link->query($provincie_sql);
                            if ($result_provincie->num_rows > 0)
                            {
                                $txt = "echo \"<li>\";" . PHP_EOL;
                                fwrite($myfile, $txt);
                                $txt = "echo \"<a href=\\\"#\\\">" . $row_regioni["DESCRIZIONE_REGIONE"] . "<span class=\\\"fa arrow\\\"></span></a>\";" . PHP_EOL;
                                fwrite($myfile, $txt);
                                $txt = "echo \"<ul class=\\\"nav nav-third-level\\\">\";" . PHP_EOL;
                                fwrite($myfile, $txt);
                                while($row_provincie = $result_provincie->fetch_assoc())
                                {
                                    $txt = "echo \"<li>\";" . PHP_EOL;
                                    fwrite($myfile, $txt);
                                    $txt = "echo \"<a href=\\\"#\\\">" . $row_provincie["DESCRIZIONE_PROVINCIA"] . "</a>\";" . PHP_EOL;
                                    fwrite($myfile, $txt);
                                    $txt = "echo \"</li>\";" . PHP_EOL;
                                    fwrite($myfile, $txt);
                                }
                                $txt = "echo \"</ul>\";" . PHP_EOL;
                                fwrite($myfile, $txt);
                            }
                            else
                            {
                                $txt = "echo \"<li>\";" . PHP_EOL;
                                fwrite($myfile, $txt);
                                $txt = "echo \"<a href=\\\"#\\\">" . $row_regioni["DESCRIZIONE_REGIONE"] . "</a>\";" . PHP_EOL;
                                fwrite($myfile, $txt);
                                $txt = "echo \"</li>\";" . PHP_EOL;
                                fwrite($myfile, $txt);
                            }
                            
                        }
                        $txt = "echo \"</ul>\";" . PHP_EOL;
                        fwrite($myfile, $txt);
                    }
                    else
                    {
                        $txt = "echo \"<li>\";" . PHP_EOL;
                        fwrite($myfile, $txt);
                        $txt = "echo \"<a href=\\\"#\\\">" . $row["RIPART_GEO"] . "</a>\";" . PHP_EOL;
                        fwrite($myfile, $txt);
                    }
                    
                    $txt = "echo \"</li>\";" . PHP_EOL;
                    fwrite($myfile, $txt);
                }
    }
    
    
    $txt = "echo \"</ul>\";" . PHP_EOL;
    fwrite($myfile, $txt);
    $txt = "?>";
    fwrite($myfile, $txt);
    fclose($myfile);
    
//                            <li>
//                                <a href="#">Second Level Link</a>
//                            </li>
//                            <li>
//                                <a href="#">Second Level Link</a>
//                            </li>
//                            <li>
//                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
//                                <ul class="nav nav-third-level">
//                                    <li>
//                                        <a href="#">Third Level Link</a>
//                                    </li>
//                                    <li>
//                                        <a href="#">Third Level Link</a>
//                                    </li>
//                                    <li>
//                                        <a href="#">Third Level Link</a>
//                                    </li>
//
//                                </ul>
//
//                            </li>
    
    $sql = "SELECT COD_COMUNE, log(convert(totale,unsigned)/100) as TOTALE FROM soldipubblici_notebook.comuni_totalespese order by convert(totale,unsigned) desc limit 30;";

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
