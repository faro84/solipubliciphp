
var width = 420,
    barHeight = 20;

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

d3.csv("assets/data/data.csv", type, function(error, data)
{
    console.log(data);
    x.domain([0, d3.max(data, function(d) { return d.value; })]);

    chart.attr("height", barHeight * data.length);

    var bar = chart.selectAll("g")
        .data(data)
        .enter().append("g")
        .attr("transform", function(d, i) { return "translate(0," + i * barHeight + ")"; });

    bar.append("a")
        .attr("xlink:href", "http://en.wikipedia.org/wiki/")
        .on("mouseover", function(d, i){ 
                d3.select(this) 
                    .attr({"xlink:href": "http://example.com/" + d.value});
            })
        .append("rect")
        .attr("width", function(d) { return x(d.value); })
        .attr("height", barHeight - 1);

//    bar.append("a") 
//         //add unchanging attributes of the <a> link
//         .attr("target", "index") //set the link to open in an unnamed tab
//         .attr("xlink:show", "new"); 
 
    bar.append("text")
        .attr("x", function(d) { return x(d.value) - 3; })
        .attr("y", barHeight / 2)
        .attr("dy", ".35em")
        .text(function(d) { return d.value; });
//
//    bar.on("click", function(d,i) {
//        
//    });
});

function getvalue(d) { return d.value; }

function type(d) {
  d.value = +d.value; // coerce to number
  return d;
}



