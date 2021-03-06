<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            <?php include "php/header/getheadernazione.php" ?> <small>Nazione</small>
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
                <h3></h3>
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
                        <table class="table table-striped table-bordered table-hover" id="tortanazione">
                            <?php echo "ciaociaoino"; ?>
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
        
    <div class="row" id="row1">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Advanced Tables
                </div>
                <div class="panel-body">
                    <div id="main">
                        <div id="sequence"></div>
                        <div id="charttortanazione">
                          <div id="explanation" style="visibility: hidden;">
                            <span id="percentage"></span><br/>
                            of visits begin with this sequence of pages
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    <div id="myOutput" style="display: none;">10</div>
            
    
    <script>
        $("#previousButton").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('myOutput').innerHTML != "10")
            {
                $("#tablespesenazione").load("php/completetableregione.php?cod_reg=" + 
                    "<?php echo "" . $_GET["cod_reg"] ?>" + "&&start=" + 
                    document.getElementById('myOutput').innerHTML + "&&off=10");
                document.getElementById('myOutput').innerHTML = 
                    parseInt(document.getElementById('myOutput').innerHTML) - 10;
                $(document).scrollTop( $("#tablespesenazione").offset().top );
            }
        });
        $("#nextButton").click(function(event)
        {
            event.preventDefault();
            $("#tablespesenazione").load("php/completetableregione.php?cod_reg=" + 
                "<?php echo "" . $_GET["cod_reg"] ?>" + "&&start=" + 
                document.getElementById('myOutput').innerHTML + "&&off=10");
            document.getElementById('myOutput').innerHTML = 
                parseInt(document.getElementById('myOutput').innerHTML) + 10;
            $(document).scrollTop( $("#tablespesenazione").offset().top );
        });
       
    </script>



