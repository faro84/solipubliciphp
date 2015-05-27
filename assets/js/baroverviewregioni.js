
var width = 820,
    barHeight = 30;

var x = d3.scale.linear()
    .range([0, width]);

//var chart = d3.select("#barspeseregioni")
//    .attr("width", width);
//var width = 750;
var height = 600;
//var chart = d3.select("#barspeseregioni").append("svg:svg")
//    .attr("width", width)
//    .attr("height", height)
//    .append("svg:g")
//    .attr("id", "container")
//    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");
var chart = d3.select("#barspeseregioni")
    .attr("width", width);

var link = "php/data/getlistaregioniperspesatotale.php";

d3.csv(link, type, function(error, data)
{
//    console.log(data);
    x.domain([0, d3.max(data, function(d) { return d.totale; })]);

    chart.attr("height", barHeight * data.length);

    var bar = chart.selectAll("g")
        .data(data)
        .enter().append("g")
        .attr("transform", function(d, i) { return "translate(0," + i * barHeight + ")"; });

    bar.append("a")
        .attr("xlink:href", "index.php")
        .on("mouseover", function(d, i){ 
                d3.select(this) 
                    .attr({"xlink:href": "index.php?content=reg&&cod_reg=" + d.codregione});
            })
        .append("rect")
        .attr("width", function(d) { return x(d.totale) - 30; })
        .attr("height", barHeight - 1);

//    bar.append("a") 
//         //add unchanging attributes of the <a> link
//         .attr("target", "index") //set the link to open in an unnamed tab
//         .attr("xlink:show", "new"); 
 
    bar.append("text")

        .attr("x", function(d) { return x(d.totale) + 30; })
        .attr("y", barHeight / 2)
        .attr("dy", ".35em")
        .attr("dx", ".35em")
        .append("a")
        .attr("xlink:href", "index.php")
        .on("mouseover", function(d, i){ 
                d3.select(this) 
                    .attr({"xlink:href": "index.php?content=reg&&cod_reg=" + d.codregione});
            })        
        //.attr("alignment-baseline","baseline")
//        .attr("text-anchor", "start")
        
        .text(function(d) { return d.regione; });
//
//    bar.on("click", function(d,i) {
//        
//    });
});

function type(d) {
  d.totale = +d.totale; // coerce to number
  return d;
}
