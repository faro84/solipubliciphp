    
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Lista comuni per spese totali<small>Comuni</small>
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
                        <table class="table table-striped table-bordered table-hover" id="porchio">
                            <?php
                                include "php/getlistacomuniperspesa.php";
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
            
    <div id="myOutput" style="display: none;">10</div>
 
    <script>
        $("#previousButton").click(function(event)
        {
            if(document.getElementById('myOutput').innerHTML != "10")
            {
                $("#porchio").load("php/listacomuniperspesa.php?cod_com=" + 
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
            $("#porchio").load("php/listacomuniperspesa.php?cod_com=" + 
                "<?php echo "" . $_GET["cod_com"]; ?>" + "&&cod_prov=" + 
                "<?php echo "" . $_GET["cod_prov"] ?>" + "&&start=" + 
            document.getElementById('myOutput').innerHTML + "&&off=10");
            document.getElementById('myOutput').innerHTML = 
                parseInt(document.getElementById('myOutput').innerHTML) + 10;
            document.getElementById('link1').scrollIntoView();
        });
    </script>