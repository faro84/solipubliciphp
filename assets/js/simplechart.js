
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
    
    function generateNazioneChart(){
        GenerateNazionePlot();
    }; 
    
    function generateComuneChart(obj) {
        GenerateComuneTestChart(obj);
        GenerateComunePlot(obj);
    }; 
    
    function generateProvinciaChart(obj) {
        
    }; 
    
    function GenerateComuneTestChart(obj) {
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
            
        var link = "php/chart.php?";
        if(obj != null)
            link = link + obj;
        //obj.replace(" ", "%20");
        console.log(link);
        
        jQuery.ajax({
                type: "GET",
                url: link ,

                success: function (obj) {
                    console.log(obj);
                },
                error:function (obj) {
                    console.log(obj);
                }
            });
        
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
    
    function GenerateComunePlot(obj) {
        // Set the dimensions of the canvas / graph
        var margin = {top: 20, right: 70, bottom: 30, left: 100},
            width = parseInt(d3.select('#row1').style('width'), 10) - margin.left - margin.right,
            height = 400 - margin.top - margin.bottom;

        console.log(parseInt(d3.select('#row1').style('width'), 10));

        // Parse the date / time
        var parseDate = d3.time.format("%d-%m-%Y").parse;

        // Set the ranges
        var x = d3.time.scale().range([0, width]);
        var y = d3.scale.linear().range([height, 0]);

        // Define the axes
        var xAxis = d3.svg.axis().scale(x)
            .orient("bottom").ticks(5);

        var yAxis = d3.svg.axis().scale(y)
            .orient("left").ticks(5);

        // Define the line
        var valueline = d3.svg.line()
            .x(function(d) { return x(d.date); })
            .y(function(d) { return y(d.totale); });

        // Adds the svg canvas
        var svg = d3.select("#scatter")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        // Get the data
        
        var link = "php/plotcomunespesemensili.php?";
        if(obj != null)
            link = link + obj;
        //obj.replace(" ", "%20");
        console.log(link);
        
        jQuery.ajax({
                type: "GET",
                url: link ,

                success: function (obj) {
                    console.log(obj);
                },
                error:function (obj) {
                    console.log(obj);
                }
            });
        
        d3.csv(link, function(error, data) {
            data.forEach(function(d) {
                d.date = parseDate(d.date);
                d.totale = +d.totale;
            });

            // Scale the range of the data
            x.domain(d3.extent(data, function(d) { return d.date; }));
            y.domain([0, d3.max(data, function(d) { return d.totale; })]);

            // Add the valueline path.
            svg.append("path")
                .attr("class", "line")
                .attr("d", valueline(data));

            // Add the scatterplot
            svg.selectAll("dot")
                .data(data)
              .enter().append("circle")
                .attr("r", 3.5)
                .attr("cx", function(d) { return x(d.date); })
                .attr("cy", function(d) { return y(d.totale); });

            // Add the X Axis
            svg.append("g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis);

            // Add the Y Axis
            svg.append("g")
                .attr("class", "y axis")
                .call(yAxis);

        });
    }; 
    
    function GenerateNazionePlot() {
        // Set the dimensions of the canvas / graph
        var margin = {top: 20, right: 70, bottom: 30, left: 100},
            width = parseInt(d3.select('#row1').style('width'), 10) - margin.left - margin.right,
            height = 400 - margin.top - margin.bottom;

        console.log(parseInt(d3.select('#row1').style('width'), 10));

        // Parse the date / time
        var parseDate = d3.time.format("%d-%m-%Y").parse;

        // Set the ranges
        var x = d3.time.scale().range([0, width]);
        var y = d3.scale.linear().range([height, 0]);

        // Define the axes
        var xAxis = d3.svg.axis().scale(x)
            .orient("bottom").ticks(5);

        var yAxis = d3.svg.axis().scale(y)
            .orient("left").ticks(5);

        // Define the line
        var valueline = d3.svg.line()
            .x(function(d) { return x(d.date); })
            .y(function(d) { return y(d.totale); });

        // Adds the svg canvas
        var svg = d3.select("#scatter")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        // Get the data
        
        var link = "php/plot/plotnazionespesemensili.php";
        //obj.replace(" ", "%20");
        console.log(link);
        
        jQuery.ajax({
                type: "GET",
                url: link ,

                success: function (obj) {
                    console.log(obj);
                },
                error:function (obj) {
                    console.log(obj);
                }
            });
        
        d3.csv(link, function(error, data) {
            data.forEach(function(d) {
                d.date = parseDate(d.date);
                d.totale = +d.totale;
            });

            // Scale the range of the data
            x.domain(d3.extent(data, function(d) { return d.date; }));
            y.domain([0, d3.max(data, function(d) { return d.totale; })]);

            // Add the valueline path.
            svg.append("path")
                .attr("class", "line")
                .attr("d", valueline(data));

            // Add the scatterplot
            svg.selectAll("dot")
                .data(data)
              .enter().append("circle")
                .attr("r", 3.5)
                .attr("cx", function(d) { return x(d.date); })
                .attr("cy", function(d) { return y(d.totale); });

            // Add the X Axis
            svg.append("g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis);

            // Add the Y Axis
            svg.append("g")
                .attr("class", "y axis")
                .call(yAxis);

        });
    }; 
