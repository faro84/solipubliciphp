<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Overview regioni<small>Regione</small>
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
                <h3>3455</h3>
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
    
<div class="row" id="rowtablespeseregione">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista spese regione
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tablespeseregione">
                        <?php include "php/overview/getcompletetableoverviewregione.php"; ?>
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
        
<div class="row" id="listacomuni">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="index.php?content=ccst&&cod_reg=<?php echo "" . $_GET["cod_reg"]; ?>">Lista comuni</a>
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
                <a href="index.php?content=ccstpc&&cod_reg=<?php echo "" . $_GET["cod_reg"]; ?>">Lista comuni</a>
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
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Enti Regionali per spesa totale
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tablespesecomune">
                            <?php
                                include "php/getenti.php";
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

    <div class="row" id="row1">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Advanced Tables
                </div>
                <div class="panel-body">
                    <svg id="barspeseregioni"></svg>
                </div>
            </div>
        </div>
    </div>

    <div id="completeTableRegioneIndex" style="display: none;">0</div>
    <div id="listaComuniSpeseTotaliIndex" style="display: none;">0</div>
    <div id="listaComuniSpeseTPerPersonaIndex" style="display: none;">0</div>


