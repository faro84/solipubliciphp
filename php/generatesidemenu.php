<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    //$txt = "<?php " . PHP_EOL;
    //fwrite($myfile, $txt);
    $txt = "<a href=\"#\"><i class=\"fa fa-sitemap\"></i> Multi-Level Dropdown<span class=\"fa arrow\"></span></a>" . PHP_EOL;
    fwrite($myfile, $txt);
    $txt = "<ul class=\"nav nav-second-level\">" . PHP_EOL;
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
                        $txt = "<li>" . PHP_EOL;
                        fwrite($myfile, $txt);
                        $txt = "<a href=\"index.php?content=rip&cod_rip=". $row["RIPART_GEO"] ."\">" . $row["RIPART_GEO"] . "<span class=\"fa arrow\"></span></a>" . PHP_EOL;
                        fwrite($myfile, $txt);
                        $txt = "<ul class=\"nav nav-third-level\">" . PHP_EOL;
                        fwrite($myfile, $txt);
                        while($row_regioni = $result_regioni->fetch_assoc())
                        {
                            $provincie_sql = "SELECT COD_PROVINCIA, DESCRIZIONE_PROVINCIA, COD_REGIONE FROM soldipubblici_notebook.anag_reg_prov WHERE "
                                    . "COD_REGIONE='" . $row_regioni["COD_REGIONE"]  . "';";
                            $result_provincie = $link->query($provincie_sql);
                            if ($result_provincie->num_rows > 0)
                            {
                                $txt = "<li>" . PHP_EOL;
                                fwrite($myfile, $txt);
                                $txt = "<a href=\"#\">" . $row_regioni["DESCRIZIONE_REGIONE"] . "<span class=\"fa arrow\"></span></a>" . PHP_EOL;
                                fwrite($myfile, $txt);
                                $txt = "<ul class=\"nav nav-third-level\">" . PHP_EOL;
                                fwrite($myfile, $txt);
                                while($row_provincie = $result_provincie->fetch_assoc())
                                {
                                    $comuni_sql = "SELECT COD_COMUNE, DESCR_COMUNE FROM soldipubblici_notebook.anagrafe_comuni WHERE "
                                    . "COD_PROVINCIA='" . $row_provincie["COD_PROVINCIA"]  . "';";
                                    $result_comuni = $link->query($comuni_sql);
                                    if ($result_comuni->num_rows > 0)
                                    {
                                        $txt = "<li>" . PHP_EOL;
                                        fwrite($myfile, $txt);
                                        $txt = "<a href=\"#\">" . $row_provincie["DESCRIZIONE_PROVINCIA"] . "<span class=\"fa arrow\"></span></a>" . PHP_EOL;
                                        fwrite($myfile, $txt);
                                        $txt = "<ul class=\"nav nav-third-level\">" . PHP_EOL;
                                        fwrite($myfile, $txt);
                                        while($row_comuni = $result_comuni->fetch_assoc())
                                        {
                                            $txt = "<li>" . PHP_EOL;
                                            fwrite($myfile, $txt);
                                            $txt = "<a href=\"index.php?content=com&cod_com=". $row_comuni["COD_COMUNE"] ."\">" . $row_comuni["DESCR_COMUNE"] . "</a>" . PHP_EOL;
                                            fwrite($myfile, $txt);
                                            $txt = "</li>" . PHP_EOL;
                                            fwrite($myfile, $txt);
                                        }
                                        
                                        $txt = "</ul>" . PHP_EOL;
                                        fwrite($myfile, $txt);
                                    }
                                    else
                                        {
                                        $txt = "<li>" . PHP_EOL;
                                        fwrite($myfile, $txt);
                                        $txt = "<a href=\"#\">" . $row_provincie["DESCRIZIONE_PROVINCIA"] . "</a>" . PHP_EOL;
                                        fwrite($myfile, $txt);
                                        $txt = "</li>" . PHP_EOL;
                                        fwrite($myfile, $txt);
                                    }
                                }
                                $txt = "</ul>" . PHP_EOL;
                                fwrite($myfile, $txt);
                            }
                            else
                            {
                                $txt = "<li>" . PHP_EOL;
                                fwrite($myfile, $txt);
                                $txt = "<a href=\"#\">" . $row_regioni["DESCRIZIONE_REGIONE"] . "</a>" . PHP_EOL;
                                fwrite($myfile, $txt);
                                $txt = "</li>" . PHP_EOL;
                                fwrite($myfile, $txt);
                            }
                            
                        }
                        $txt = "</ul>" . PHP_EOL;
                        fwrite($myfile, $txt);
                    }
                    else
                    {
                        $txt = "<li>" . PHP_EOL;
                        fwrite($myfile, $txt);
                        $txt = "<a href=\"#\">" . $row["RIPART_GEO"] . "</a>" . PHP_EOL;
                        fwrite($myfile, $txt);
                    }
                    
                    $txt = "</li>" . PHP_EOL;
                    fwrite($myfile, $txt);
                }
    }
    
    
    $txt = "</ul>" . PHP_EOL;
    fwrite($myfile, $txt);
    
    fclose($myfile);
    
?>

