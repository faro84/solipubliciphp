    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                <?php echo $_GET["cod_tip"]; ?> <small>Responsive tables</small>
            </h1>
        </div>
        <div class="col-md-12">
            <h1 class="page-header">
                Lista comuni per spese per singola tipologia<small>Comune</small>
            </h1>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Responsive Table Example
                </div> 
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="maintable">
                            <?php
                                include "php/getlistacomuniperspesaperspecificatipologia.php";
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
            
    <div id="myOutput" style="display: none;">0</div>
 
    <script>
        $("#previousButton").click(function(event)
        {
            if(document.getElementById('myOutput').innerHTML != "0")
            {
                document.getElementById('myOutput').innerHTML = 
                    parseInt(document.getElementById('myOutput').innerHTML) - 30;
                var link = "php/getlistacomuniperspesaperspecificatipologia.php?cod_tip=" + 
                    encodeURIComponent("<?php echo "" . $_GET["cod_tip"]; ?>") + "&&start=" + 
                    document.getElementById('myOutput').innerHTML + "&&off=30";
                //console.log(link);
                //console.log(document.getElementById('maintable').rows.length);
                $("#maintable").load(link);
                document.getElementById('link1').scrollIntoView();
            }
        });
        $("#nextButton").click(function(event)
        {
            if(document.getElementById('maintable').rows.length != 31)
            {
                document.getElementById('myOutput').innerHTML = 
                    parseInt(document.getElementById('myOutput').innerHTML) + 30;
                var link = "php/getlistacomuniperspesaperspecificatipologia.php?cod_tip=" + 
                    encodeURIComponent("<?php echo "" . $_GET["cod_tip"]; ?>") + "&&start=" + 
                document.getElementById('myOutput').innerHTML + "&&off=30";
                //console.log(link);
                //console.log(document.getElementById('myOutput').innerHTML);
                $("#maintable").load(link);
                document.getElementById('link1').scrollIntoView();
            }
        });
    </script>