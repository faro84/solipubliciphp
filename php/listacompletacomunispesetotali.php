    
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header" id="tablecomunispesetotalirow">
                Lista comuni per spese totali<small>Comuni</small>
            </h1>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista comuni per spese totali
                </div> 
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tablecomunispesetotali">
                            <?php include "php/getlistacomuniperspesa.php"; ?>
                        </table>
                    </div>
                    <div class="buttonsPreviousNext">
                        <a href="" id="previousButton" class="text-left">
                            <i class="fa fa-arrow-circle-left"></i>Previous Tasks
                        </a>
                        <a href="" id="nextButton" class="text-right">
                            Next Tasks <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <div id="tableComuniSpeseTotaliIndex" style="display: none;">0</div>
 
    <script>
        $("#previousButton").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('tableComuniSpeseTotaliIndex').innerHTML != "0")
            {
                document.getElementById('tableComuniSpeseTotaliIndex').innerHTML = 
                    parseInt(document.getElementById('tableComuniSpeseTotaliIndex').innerHTML) - 30;
                
                <?php 
                
                if(isset($_GET["cod_prov"]))
                {
                    $partialLink = "\"cod_prov=" . $_GET["cod_prov"] . "&&\"";
                }
                elseif (isset($_GET["cod_reg"]))
                {
                    $partialLink = "\"cod_reg=" . $_GET["cod_reg"] . "&&\"";
                }
                elseif (isset($_GET["cod_rip"]))
                {
                    $partialLink = "\"cod_rip=" . urlencode($_GET["cod_rip"]) . "&&\"";
                }
                else
                {
                    $partialLink = "\"\"";
                }
                
                ?>
                
                var link = "php/getlistacomuniperspesa.php?" + <?php echo $partialLink; ?> + "start=" 
                        + document.getElementById('tableComuniSpeseTotaliIndex').innerHTML + "&&off=30";
                
                $("#tablecomunispesetotali").load(link);
                console.log(link);
                $(document).scrollTop( $("#tablecomunispesetotalirow").offset().top );
            }
        });
        $("#nextButton").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('tablecomunispesetotali').rows.length == 31)
            {
                document.getElementById('tableComuniSpeseTotaliIndex').innerHTML = 
                    parseInt(document.getElementById('tableComuniSpeseTotaliIndex').innerHTML) + 30;
            
                <?php 
                
                if(isset($_GET["cod_prov"]))
                {
                    $partialLink = "\"cod_prov=" . $_GET["cod_prov"] . "&&\"";
                }
                elseif (isset($_GET["cod_reg"]))
                {
                    $partialLink = "\"cod_reg=" . $_GET["cod_reg"] . "&&\"";
                }
                elseif (isset($_GET["cod_rip"]))
                {
                    $partialLink = "\"cod_rip=" . urlencode($_GET["cod_rip"]) . "&&\"";
                }
                else
                {
                    $partialLink = "\"\"";
                }
                
                ?>
                
                var link = "php/getlistacomuniperspesa.php?" + <?php echo $partialLink; ?> + "start=" 
                        + document.getElementById('tableComuniSpeseTotaliIndex').innerHTML + "&&off=30";
                console.log(link);
                $("#tablecomunispesetotali").load(link);
                
                $(document).scrollTop( $("#tablecomunispesetotalirow").offset().top );
            }
        });
    </script>