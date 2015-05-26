    <?php include "php/order/getripartizioneordertotalespese.php" ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            <?php include "php/header/getheaderripartizione.php" ?> <small>Ripartizione</small>
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
                <h3><?php include "php/order/getripartizioneordertotalespese.php" ?></h3>
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
                        <table class="table table-striped table-bordered table-hover" id="tablespeseripartizione">
                            <?php include "php/completetableripartizione.php"; ?>
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
        
<div class="row" id="listacomuni">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="index.php?content=ccst&&cod_rip=<?php echo "" . $_GET["cod_rip"]; ?>">Lista comuni</a>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="tablecomunispesetotali">
                    <?php include("php/gettoptenspesetotalicomuni.php") ?>
                </table>
                <div class="buttonsPreviousNext">
                    <a href="" id="previousButtonComuniSpeseTotali" class="text-left"> 
                        <i class="fa fa-arrow-circle-left"></i>Previous Tasks
                    </a>
                    <a href="" id="nextButtonComuniSpeseTotali" class="text-right">
                        Next Tasks <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="index.php?content=ccstpc&&cod_rip=<?php echo "" . $_GET["cod_rip"]; ?>">Lista comuni</a>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <table class="table table-striped table-bordered table-hover" id="tablecomunispeseperpersona">
                        <?php include("php/data/getclassificacomunitotalepercittadino.php") ?>
                    </table>
                </div>
                <div class="buttonsPreviousNext">
                    <a href="" id="previousButtonComuniSpesePerPersona" class="text-left"> 
                        <i class="fa fa-arrow-circle-left"></i>Previous Tasks
                    </a>
                    <a href="" id="nextButtonComuniSpesePerPersona" class="text-right">
                        Next Tasks <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
                
    <div id="completeTableRipartizioneIndex" style="display: none;">0</div>
    <div id="listaComuniSpeseTotaliIndex" style="display: none;">0</div>
    <div id="listaComuniSpeseTPerPersonaIndex" style="display: none;">0</div>
    
    <script>
        
        $("#previousButton").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('completeTableRipartizioneIndex').innerHTML != "0")
            {
                document.getElementById('completeTableRipartizioneIndex').innerHTML = 
                    parseInt(document.getElementById('completeTableRipartizioneIndex').innerHTML) - 10;
                
                $("#tablespeseripartizione").load("php/completetableripartizione.php?cod_rip=" + 
                    encodeURIComponent("<?php echo "" . $_GET["cod_rip"] ?>") + "&&start=" + 
                    document.getElementById('completeTableRipartizioneIndex').innerHTML + "&&off=10");
                
                $(document).scrollTop( $("#tablespeseripartizione").offset().top );
            }
        });
        $("#nextButton").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('tablespeseripartizione').rows.length == 11)
            {
                document.getElementById('completeTableRipartizioneIndex').innerHTML = 
                    parseInt(document.getElementById('completeTableRipartizioneIndex').innerHTML) + 10;
                
                var link = "php/completetableripartizione.php?cod_rip=" + 
                    encodeURIComponent("<?php echo "" . $_GET["cod_rip"] ?>") + "&&start=" + 
                    document.getElementById('completeTableRipartizioneIndex').innerHTML + "&&off=10";
//                console.log(link);
                $("#tablespeseripartizione").load(link);
                
                $(document).scrollTop( $("#tablespeseripartizione").offset().top );
            }
        });
        
        $("#previousButtonComuniSpeseTotali").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('listaComuniSpeseTotaliIndex').innerHTML != "0")
            {
                document.getElementById('listaComuniSpeseTotaliIndex').innerHTML = 
                    parseInt(document.getElementById('listaComuniSpeseTotaliIndex').innerHTML) - 10;
                var link = "php/gettoptenspesetotalicomuni.php?cod_rip=" + 
                    encodeURIComponent("<?php echo "" . $_GET["cod_rip"] ?>") + "&&start=" + 
                    document.getElementById('listaComuniSpeseTotaliIndex').innerHTML + "&&off=10";
                //console.log(link);
                $("#tablecomunispesetotali").load(link);
                
                $(document).scrollTop( $("#listacomuni").offset().top );
            }
        });
        $("#nextButtonComuniSpeseTotali").click(function(event)
        {
            event.preventDefault();
            //console.log(document.getElementById('tablespeseregione').rows.length);
            if(document.getElementById('tablecomunispesetotali').rows.length == 11)
            {
                document.getElementById('listaComuniSpeseTotaliIndex').innerHTML = 
                    parseInt(document.getElementById('listaComuniSpeseTotaliIndex').innerHTML) + 10;
                var link = "php/gettoptenspesetotalicomuni.php?cod_rip=" + 
                    encodeURIComponent("<?php echo "" . $_GET["cod_rip"] ?>") + "&&start=" + 
                    document.getElementById('listaComuniSpeseTotaliIndex').innerHTML + "&&off=10";
                $("#tablecomunispesetotali").load(link);
                $(document).scrollTop( $("#listacomuni").offset().top );
            }
        });
        
        $("#previousButtonComuniSpesePerPersona").click(function(event)
        {
            event.preventDefault();
            if(document.getElementById('listaComuniSpeseTPerPersonaIndex').innerHTML != "0")
            {
                document.getElementById('listaComuniSpeseTPerPersonaIndex').innerHTML = 
                    parseInt(document.getElementById('listaComuniSpeseTPerPersonaIndex').innerHTML) - 10;
                var link = "php/data/getclassificacomunitotalepercittadino.php?cod_rip=" + 
                    encodeURIComponent("<?php echo "" . $_GET["cod_rip"] ?>") + "&&start=" + 
                    document.getElementById('listaComuniSpeseTPerPersonaIndex').innerHTML + "&&off=10";
                //console.log(link);
                $("#tablecomunispeseperpersona").load(link);
                
                $(document).scrollTop( $("#listacomuni").offset().top );
            }
        });
        $("#nextButtonComuniSpesePerPersona").click(function(event)
        {
            event.preventDefault();
            //console.log(document.getElementById('tablespeseregione').rows.length);
            if(document.getElementById('tablecomunispeseperpersona').rows.length == 11)
            {
                document.getElementById('listaComuniSpeseTPerPersonaIndex').innerHTML = 
                    parseInt(document.getElementById('listaComuniSpeseTPerPersonaIndex').innerHTML) + 10;
                var link = "php/data/getclassificacomunitotalepercittadino.php?cod_rip=" + 
                    encodeURIComponent("<?php echo "" . $_GET["cod_rip"] ?>") + "&&start=" + 
                    document.getElementById('listaComuniSpeseTPerPersonaIndex').innerHTML + "&&off=10";
                $("#tablecomunispeseperpersona").load(link);
                $(document).scrollTop( $("#listacomuni").offset().top );
            }
        });
        
    </script>