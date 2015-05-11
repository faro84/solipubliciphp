    
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                <?php include "php/header/getheadercomune.php" ?> <small>Responsive tables</small>
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
                    <strong> Daily Visits</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-blue blue">
                    <div class="panel-left pull-left blue">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>                
                    <div class="panel-right pull-right">
                        <h3>52,160 </h3>
                        <strong> Sales</strong>
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
                        <table class="table table-striped table-bordered table-hover" id="porchio">
                            <?php
                                include "php/completetablecomune.php";
                            ?>
                        </table>
                    </div>
                    <div class="buttonsPreviousNext">
                        <a href="#" id="previousButton" class="text-left"> <i class="fa fa-arrow-circle-left"></i>Previous Tasks</a>
                        <a href="#" id="nextButton" class="text-right">Next Tasks <i class="fa fa-arrow-circle-right"></i></a>
                        <a href="#1" id="link1"></a>
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
                    Enti Panel
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
            if(document.getElementById('myOutput').innerHTML != "10")
            {
                $("#porchio").load("php/completetablecomune.php?cod_com=" + 
                    "<?php echo "" . $_GET["cod_com"]; ?>" + "&&cod_prov=" + 
                    "<?php echo "" . $_GET["cod_prov"] ?>" + "&&start=" + 
                document.getElementById('myOutput').innerHTML + "&&off=10");
                document.getElementById('myOutput').innerHTML = 
                    parseInt(document.getElementById('myOutput').innerHTML) - 10;
                document.getElementById('link1').scrollIntoView();
            }
        });
        $("#nextButton").click(function(event)
        {
            $("#porchio").load("php/completetablecomune.php?cod_com=" + 
                "<?php echo "" . $_GET["cod_com"]; ?>" + "&&cod_prov=" + 
                "<?php echo "" . $_GET["cod_prov"] ?>" + "&&start=" + 
            document.getElementById('myOutput').innerHTML + "&&off=10");
            document.getElementById('myOutput').innerHTML = 
                parseInt(document.getElementById('myOutput').innerHTML) + 10;
            document.getElementById('link1').scrollIntoView();
        });
    </script>