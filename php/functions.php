<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    function get_type($r_id)
    {
        global $conn;
        
        
        //$result=mysqli_query($conn, "SELECT * FROM soldipubblici_notebook.anag_codgest_uscite where COD_GEST=". $r_id .";") 
          //      or die("select type from rooms where id=$r_id" . "<br/><br/>" . mysqli_error());
        //$row = mysqli_fetch_array($result);
        //return "";
        //return $row['DESCRIZIONE_CGU']."<br/>";
        
        // Create connection
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            $sql = "SELECT * FROM soldipubblici_notebook.anag_comparti WHERE COD_COMPARTO = \"" . $r_id . "\"";
        
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["COD_COMPARTO"]. "<br>";
                }
            } else {
                echo "0 results";
            }
        }
        
        
    }
    
    function GetComuniTabella($start, $end)
    {
        echo $start;
        echo "<table class=\"table table-striped\">";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Codice</th>";
        echo "<th>Descrizione</th>";
        echo "<th>Provincia</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        global $conn;
        global $server;
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $limit = $end;
        $sql = "SELECT * FROM soldipubblici_notebook.anagrafe_comuni ORDER BY COD_COMUNE LIMIT " . $limit . " OFFSET " . $start . ";";
        echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["COD_COMUNE"] . "</td>";
                echo "<td>" . $row["DESCR_COMUNE"] . "</td>";
                echo "<td>" . $row["COD_PROVINCIA"] . "</td>";
                
                echo "</tr>";
            }
        } else {
        }
        echo "</tbody>";
        echo "</table>";
    }

?>

