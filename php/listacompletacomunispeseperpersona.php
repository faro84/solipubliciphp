    
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header" id="tablecomunispeseperpersonarow">
                Lista comuni per spese per persona<small>Comuni</small>
            </h1>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista comuni per spese per persona
                </div> 
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tablecomunispeseperpersona">
                            <?php include "php/getlistacomuniperspesaperpersona.php"; ?>
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
            
    <div id="tableComuniSpesePerPersonaIndex" style="display: none;">0</div>
 
    <script>
        $("#previousButton").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('tableComuniSpesePerPersonaIndex').innerHTML != "0")
            {
                document.getElementById('tableComuniSpesePerPersonaIndex').innerHTML = 
                    parseInt(document.getElementById('tableComuniSpesePerPersonaIndex').innerHTML) - 30;
                
                <?php 
                
                if(isset($_GET["cod_reg"]) && isset($_GET["cod_prov"]))
                {
                    $partialLink = "\"cod_prov=" . $_GET["cod_prov"] + "&&cod_reg=" . $_GET["cod_reg"] . "&&\"";
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
                
                var link = "php/getlistacomuniperspesaperpersona.php?" + <?php echo $partialLink; ?> + "start=" 
                        + document.getElementById('tableComuniSpesePerPersonaIndex').innerHTML + "&&off=30";
                
                $("#tablecomunispeseperpersona").load(link);
                
                $(document).scrollTop( $("#tablecomunispeseperpersonarow").offset().top );
            }
        });
        $("#nextButton").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('tablecomunispeseperpersona').rows.length == 31)
            {
                document.getElementById('tableComuniSpesePerPersonaIndex').innerHTML = 
                    parseInt(document.getElementById('tableComuniSpesePerPersonaIndex').innerHTML) + 30;
            
                <?php 
                
                if(isset($_GET["cod_reg"]) && isset($_GET["cod_prov"]))
                {
                    $partialLink = "\"cod_prov=" . $_GET["cod_prov"] + "&&cod_reg=" . $_GET["cod_reg"] . "&&\"";
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
                
                var link = "php/getlistacomuniperspesaperpersona.php?" + <?php echo $partialLink; ?> + "start=" 
                        + document.getElementById('tableComuniSpesePerPersonaIndex').innerHTML + "&&off=30";
                
                $("#tablecomunispeseperpersona").load(link);
                
                $(document).scrollTop( $("#tablecomunispeseperpersonarow").offset().top );
            }
        });
    </script>
