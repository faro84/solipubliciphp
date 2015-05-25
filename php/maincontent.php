    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Dashboard 
                <small>
                    Summary of your App <?php $blah = get_type("CDC"); echo $blah; ?>
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
        </div>
    </div>

    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-green green">
                <div class="panel-left pull-left green">
                    <i class="fa fa-bar-chart-o fa-5x"></i>
                </div>
                <div class="panel-right pull-right">
                    <h3>8,457</h3>
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
				
    <label>Text Input</label>
        <input id="country_name" class="form-control">
        <div class="row">
            <div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
			<h4>Customers</h4>
			<div class="easypiechart" id="easypiechart-blue" data-percent="82" >
                            <span class="percent">82%</span>
			</div>
                    </div>
		</div>
            </div>
            <div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
			<h4>Sales</h4>
                            <div class="easypiechart" id="easypiechart-orange" data-percent="55" >
                                <span class="percent">55%</span>
                            </div>
                    </div>
		</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
			<h4>Profits</h4>
			<div class="easypiechart" id="easypiechart-teal" data-percent="84" >
                            <span class="percent">84%</span>
			</div>
                    </div>
		</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>No. of Visits</h4>
                            <div class="easypiechart" id="easypiechart-red" data-percent="46" >
                                <span class="percent">46%</span>
                            </div>
                    </div>
		</div>
            </div>
        </div>
        <!--/.row-->
			
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
				
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bar Chart Example
                    </div>
                    <div class="panel-body">
                        <div id="morris-bar-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Donut Chart Example
                    </div>
                    <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                    </div>
                        </div>
            </div>
        </div>
                
	<div class="row">
            <div class="col-md-12">
		<div class="panel panel-default">
                    <div class="panel-heading">
                        Area Chart
                    </div>
                    <div class="panel-body">
                        <div id="morris-area-chart"></div>
                    </div>
		</div>  
            </div>		
	</div>
    <!-- /. ROW  -->

	<div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="index.php?content=ccst">Lista comuni</a>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <table class="table table-striped table-bordered table-hover" id="tablespeseregione">
                                <?php include("php/gettoptenspesetotalicomuni.php") ?>
                            </table>
                        </div>
                        
                        <div>
                            <a href="#" class="text-left">Previous Tasks <i class="fa fa-arrow-circle-left"></i></a>
                            <a href="#" class="text-right">Next Tasks <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="index.php?content=ccstpc">Lista comuni</a>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <table class="table table-striped table-bordered table-hover" id="tablespeseregione">
                                <?php include("php/data/getclassificacomunitotalepercittadino.php") ?>
                            </table>
                        </div>
                        <div>
                            <a href="#" class="text-left">Previous Tasks <i class="fa fa-arrow-circle-left"></i></a>
                            <a href="#" class="text-right">Next Tasks <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

