//var w = 1500,
//		    h = 500;

 function myfunction(obj){
    var margin = {top: 20, right: 50, bottom: 30, left: 100},
        width = 1260 - margin.left - margin.right,
        height = 600 - margin.top - margin.bottom;

    var x = d3.scale.ordinal()
        .rangeRoundBands([0, width], .1);

    var y = d3.scale.linear()
        .range([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left");

    var chart = d3.select("#chart")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
	console.log("porca madonna");
        jQuery.ajax({
            type: "GET",
            url: 'php/chart.php',

            success: function (obj) {
                        //console.log("porca madonna");
                        console.log(obj);
            }
        });
        
    d3.json("php/chart.php", function(error, json) {
                    
                        if (error) return console.warn(error);
                        
			var data = json;
	
    x.domain(data.map(function(d) { return d.COD_COMUNE; }));
    y.domain([0, d3.max(data, function(d) { return d.TOTALE; })]);

    chart.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    chart.append("g")
        .attr("class", "y axis")
        .call(yAxis);

    chart.selectAll(".bar")
        .data(data)
        .enter().append("rect")
        .attr("class", "bar")
        .attr("x", function(d) { return x(d.COD_COMUNE); })
        .attr("y", function(d) { return y(d.TOTALE); })
        .attr("height", function(d) { return height - y(d.TOTALE); })
        .attr("width", x.rangeBand());
        }); 
 }
        
    function generateRipartizioneChart(obj) {
       var margin = {top: 20, right: 50, bottom: 30, left: 100},
        width = 1260 - margin.left - margin.right,
        height = 600 - margin.top - margin.bottom;

    var x = d3.scale.ordinal()
        .rangeRoundBands([0, width], .1);

    var y = d3.scale.linear()
        .range([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left");

    var chart = d3.select("#chart")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
	console.log(obj);
        jQuery.ajax({
            type: "GET",
            url: 'php/chart.php?cod_rip=' + obj ,

            success: function (obj) {
                        //console.log("porca madonna");
                        console.log(obj);
            }
        });
        
        var link = "php/chart.php";
        if(obj != null)
            link = link + "?cod_rip=" + obj.replace(" ", "%20");
        
        console.log(link);
        
    d3.json(link, function(error, json) {
                    
                        if (error) return console.warn(error);
                        
			var data = json;
	
    x.domain(data.map(function(d) { return d.COD_REGIONE; }));
    y.domain([0, d3.max(data, function(d) { return d.TOTALE; })]);

    chart.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    chart.append("g")
        .attr("class", "y axis")
        .call(yAxis);

    chart.selectAll(".bar")
        .data(data)
        .enter().append("rect")
        .attr("class", "bar")
        .attr("x", function(d) { return x(d.COD_REGIONE); })
        .attr("y", function(d) { return y(d.TOTALE); })
        .attr("height", function(d) { return height - y(d.TOTALE); })
        .attr("width", x.rangeBand());
        }); 
    }; 
    
    function generateComuneChart(obj) {
       var margin = {top: 20, right: 50, bottom: 30, left: 100},
        width = 1260 - margin.left - margin.right,
        height = 600 - margin.top - margin.bottom;

    var x = d3.scale.ordinal()
        .rangeRoundBands([0, width], .1);

    var y = d3.scale.linear()
        .range([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left");

    var chart = d3.select("#chart")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
	console.log(obj);
        jQuery.ajax({
            type: "GET",
            url: 'php/chart.php?cod_com=' + obj ,

            success: function (obj) {
                        //console.log("porca madonna");
                        console.log(obj);
            }
        });
        
        var link = "php/chart.php";
        if(obj != null)
            link = link + "?cod_com=" + obj.replace(" ", "%20");
        
        console.log(link);
        
    d3.json(link, function(error, json) {
                    
                        if (error) return console.warn(error);
                        
			var data = json;
	
    x.domain(data.map(function(d) { return d.COD_REGIONE; }));
    y.domain([0, d3.max(data, function(d) { return d.TOTALE; })]);

    chart.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    chart.append("g")
        .attr("class", "y axis")
        .call(yAxis);

    chart.selectAll(".bar")
        .data(data)
        .enter().append("rect")
        .attr("class", "bar")
        .attr("x", function(d) { return x(d.COD_REGIONE); })
        .attr("y", function(d) { return y(d.TOTALE); })
        .attr("height", function(d) { return height - y(d.TOTALE); })
        .attr("width", x.rangeBand());
        }); 
    }; 
