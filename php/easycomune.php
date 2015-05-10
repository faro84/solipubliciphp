<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//    global $start;
//    global $off;
    //require("php/functions.php");
    if(isset($_GET["start"])){
        $start = $_GET["start"];
        $off = $_GET["off"];
        $cod_com = $_GET["cod_com"];
        $cod_prov = $_GET["cod_prov"];
    }
    GetComuniSpeseTabella2($start, $off);
    
    function GetComuniSpeseTabella2($start, $end)
    {
        //echo $start;
//        echo "<table class=\"table table-striped\">";
//        echo "<thead>";
//        echo "<tr>";
//        echo "<th>Codice</th>";
//        echo "<th>Descrizione</th>";
//        echo "<th>Provincia</th>";
//        echo "</tr>";
//        echo "</thead>";
//        echo "<tbody>";
//                                    </a>
//                                    <a href="#" class="list-group-item">
//                                        <span class="badge">16 minutes ago</span>
//                                        <i class="fa fa-fw fa-truck"></i> Order 392 shipped
//                                    </a>
//                                    <a href="#" class="list-group-item">
//                                        <span class="badge">36 minutes ago</span>
//                                        <i class="fa fa-fw fa-globe"></i> Invoice 653 has paid
//                                    </a>
//                                    <a href="#" class="list-group-item">
//                                        <span class="badge">1 hour ago</span>
//                                        <i class="fa fa-fw fa-user"></i> A new user has been added
//                                    </a>
//                                    <a href="#" class="list-group-item">
//                                        <span class="badge">1.23 hour ago</span>
//                                        <i class="fa fa-fw fa-user"></i> A new user has added
//                                    </a>
//                                    <a href="#" class="list-group-item">
//                                        <span class="badge">yesterday</span>
//                                        <i class="fa fa-fw fa-globe"></i> Saved the world
//                                    </a>
        $username = "root"; 
        $password = "root";   
        $host = "localhost";
        $database= "soldipubblici_notebook";

        // Create connection
        $conn = new mysqli($host, $username, $password, $database);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $limit = $end;
        $sql = "SELECT * FROM soldipubblici_notebook.comuni_spesatotale_per_tipologia "
                . "where cod_comune = '" . $_GET["cod_com"] . "' && "
                . "cod_provincia= '" . $_GET["cod_prov"] . "' ORDER BY TOTALE "
                . "DESC LIMIT " . $limit . " OFFSET " . $start . ";";
        echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<a href=\"#\" class=\"list-group-item\">";
                echo "<span class=\"badge\">" . $row["TOTALE"] . "</span>";
                echo "<i class=\"fa fa-fw fa-comment\"></i>" . $row["DESCRIZIONE"];
                echo "</a>";
            }
        }
        
        $conn->close();
//        else {
//        }
//        echo "</tbody>";
//        echo "</table>";
    }
