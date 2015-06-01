
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

var link = "php/data/getlistaregioniperspesatotale.php";

d3.csv(link, type, function(error, data)
{
    var chart = d3.select("#barspeseregioni")
    .attr("width", width + d3.max(data, function(d) { return d.totale; }));
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
        .attr("width", function(d) { return x(d.totale); })
        .attr("height", barHeight - 1);

//    bar.append("a") 
//         //add unchanging attributes of the <a> link
//         .attr("target", "index") //set the link to open in an unnamed tab
//         .attr("xlink:show", "new"); 
 
 
    function getLength(d) {
        var i = 0;
        
        if(d.regione == "EMILIA-ROMAGNA")
        {
           i = d.regione.length * 6.5; 
        }
        else if(d.regione == "FRIULI-VENEZIA GIULIA")
        {
           i = d.regione.length * 5.7; 
        }
        else if(d.regione == "SICILIA")
        {
           i = d.regione.length * 5.6; 
        }
        else if(d.regione == "VALLE D'AOSTA")
        {
           i = d.regione.length * 6.4; 
        }
        else if(d.regione == "MARCHE")
        {
           i = d.regione.length * 7.4; 
        }
        else if(d.regione == "BASILICATA")
        {
           i = d.regione.length * 6.2; 
        }
        else if(d.regione == "TRENTINO-ALTO ADIGE")
        {
           i = d.regione.length * 6.2; 
        }
        else if(d.regione == "SARDEGNA")
        {
           i = d.regione.length * 7.3; 
        }
        else if(d.regione == "VENETO")
        {
           i = d.regione.length * 7.2;
        }
        else if(d.regione == "TOSCANA")
        {
           i = d.regione.length * 7.4; 
        }
        else if(d.regione.length < 5){
            i = d.regione.length * 7;
        }
        else if(d.regione.length < 14){
            i = d.regione.length * 7;
        }
        else{
            i = d.regione.length * 6;
        }
        
        return x(d.totale) + i;
    }
    
    bar.append("text")
        .attr("x", function(d) {
            return getLength(d); })
        .attr("y", barHeight / 2)
        .attr("dy", ".35em")
        .attr("dx", "0")
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
