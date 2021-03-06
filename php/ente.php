    
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                <?php include "php/header/getheaderente.php" ?> <small>Responsive tables</small>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-green green">
                <div class="panel-left pull-left green">
                    <i class="fa fa-bar-chart-o fa-5x"></i>                
                </div>
                <div class="panel-right pull-right">
                    <h3><?php include "php/getordertotalespese.php" ?></h3>
                    <strong> Posizione per totale spese</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-blue blue">
                    <div class="panel-left pull-left blue">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>                
                    <div class="panel-right pull-right">
                        <h3> <?php include("php/data/getorderespeseperpersona.php"); ?> </h3>
                        <strong> Posizione per spesa per persona</strong>
                    </div>
                </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-red red">
                <div class="panel-left pull-left red">
                    <i class="fa fa fa-comments fa-5x"></i> 
                </div>
                <div class="panel-right pull-right">
                    <h3>15,823 </h3>
                    <strong> Comments </strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-brown brown">
                <div class="panel-left pull-left brown">
                    <i class="fa fa-users fa-5x"></i>    
                </div>
                <div class="panel-right pull-right">
                    <h3>36,752 </h3>
                    <strong>No. of Visits</strong>
                </div>
            </div>
        </div>
     </div>
    <!-- /. ROW  -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Responsive Table Example
                </div> 
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tablespeseente">
                            <?php
                                include "php/completetableente.php";
                            ?>
                        </table>
                    </div>
                    <div class="buttonsPreviousNext">
                        <a href="#" id="previousButton" class="text-left">
                            <i class="fa fa-arrow-circle-left"></i>Previous Tasks
                        </a>
                        <a href="#" id="nextButton" class="text-right">
                            Next Tasks <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Spese Totali Comune 
                </div>
                <div class="panel-body">
                    <svg id="chart"></svg>
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
                
    <div class="row" id="row1">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Advanced Tables
                </div>
                <div class="panel-body">
                    <svg id="scatter"></svg>
                </div>
            </div>
        </div>
    </div>
                
    <div id="myOutput" style="display: none;">10</div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href=<?php echo "index.php?content=sptc&&cod_com=" . $_GET["cod_com"] . "&&cod_prov=" . $_GET["cod_prov"] . ">Spese per tipologia panel</a>";?>
                </div>
                <div class="panel-body">
                    <div class="list-group-mine">
                        <?php
                            global $start;
                            global $off;
                            $start = 0;
                            $off = 10;
                            include "php/easycomune.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href=<?php echo "index.php?content=ec&&cod_com=" . $_GET["cod_com"] . "&&cod_prov=" . $_GET["cod_prov"] . ">Enti panel</a>";?>
                </div>
                <div class="panel-body">
                    <div class="list-group-mine">
                        <?php
                            global $start;
                            global $off;
                            $start = 0;
                            $off = 10;
                            include "php/getenticomune.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <script>
        $("#previousButton").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('myOutput').innerHTML != "10")
            {
                $("#tablespeseente").load("php/completetableente.php?cod_ente=" + 
                    "<?php echo "" . $_GET["cod_ente"]; ?>" + "&&start=" + 
                document.getElementById('myOutput').innerHTML + "&&off=10");
                document.getElementById('myOutput').innerHTML = 
                    parseInt(document.getElementById('myOutput').innerHTML) - 10;
                $(document).scrollTop( $("#tablespeseregione").offset().top );
            }
        });
        $("#nextButton").click(function(event)
        {
            event.preventDefault();
            $("#tablespeseente").load("php/completetableente.php?cod_ente=" + 
                "<?php echo "" . $_GET["cod_ente"]; ?>" + "&&start=" + 
            document.getElementById('myOutput').innerHTML + "&&off=10");
            document.getElementById('myOutput').innerHTML = 
                parseInt(document.getElementById('myOutput').innerHTML) + 10;
            $(document).scrollTop( $("#tablespeseregione").offset().top );
        });
    </script>

