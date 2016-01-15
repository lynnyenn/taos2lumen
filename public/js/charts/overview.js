/* d3 vars */
var margin = {top: 0, right: 80, bottom: 30, left: 30},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;
//var xValue = xScale.invert(mousex);
var bisectDate = d3.bisector(function(d) { return d.date; }).left;

//var parseDate = d3.time.format("%d-%b-%y").parse;
//var parseDate = d3.time.format("%H-%i").parse;

var div = d3.select("#charts").append("div")
    .attr("class", "tooltip ui middle aligned divided list")
    .style("opacity", 0);

//var tip = d3.tip().html(function(d) { return d; });
var formatTime = d3.time.format("%e %B");
var x = d3.time.scale().range([0, width]);
var y0 = d3.scale.linear().range([height, 0]);
var y1 = d3.scale.linear().range([height, 0]);
var y2 = d3.scale.linear().range([height, 0]);
//var y3 = d3.scale.linear().range([height, 0]);
var mousex;
var bisectDate = d3.bisector(function(d) { return d.date; }).left;
/* d3 axes */
var xAxis = d3.svg.axis().scale(x)
    .orient("bottom").ticks(10);
var yAxisLeft = d3.svg.axis().scale(y0)
    .orient("left").ticks(10);
var yAxisRight = d3.svg.axis().scale(y1)
    .orient("right").ticks(10);

/* d3 lines */
var templine = d3.svg.line()
    .x(function(d) { return x(d.timestamp*1000); })
    .y(function(d) { return y0(d.temperature); })
    .interpolate("basis");

var humpline = d3.svg.line()
    .x(function(d) { return x(d.timestamp*1000); })
    .y(function(d) { return y1(d.humidity); })
    .interpolate("basis");

var windline = d3.svg.area()
    .x(function(d) { return x(d.timestamp*1000); })
    .y0(height)
    .y1(function(d) { return y2(d.wind_speed); })
    .interpolate("basis");

var rainfallline = d3.svg.line()
    .x(function(d) { return x(d.timestamp*1000); })
    .y(function(d) { return y0(d.rainfall); })
    .interpolate("basis");

// Define the div for the tooltip
//
/*
var div = d3.select("#charts").append("div")
    .attr("class", "tooltip")
    .style("opacity", 0);
*/
var svg = d3.select("#charts")
    .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
    .append("g")
      .attr("class","stack")
      .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");
var bisectDate = d3.bisector(function(d) { return d.date; }).left;

// Get the data

d3.tsv("/charts/0", function(error, data) {
  data.forEach(function(d) {
      //d.date = parseDate(d.timestamp);
      d.date           = new Date(d.timestamp*1000);
      d.temperature    = +d.temperature;
      d.humidity       = +d.humidity;
      d.pressure       = +d.pressure;
      d.wind_speed     = +d.wind_speed;
      d.wind_direction = +d.wind_direction;
      d.rainfall       = +d.rainfall;
      d.heater_temp    = +d.heater_temp;
  });
  // Scale the range of the data
  x.domain(d3.extent(data, function(d) { return d.date; }));
  y0.domain([0, d3.max(data, function(d) {return Math.max(d.temperature); })]);

  y1.domain([d3.min(data, function(d) {return Math.min(d.humidity); })-1, d3.max(data, function(d) {return Math.max(d.humidity); })]);
  y2.domain([0, 20]);
  //y3.domain([-1, 5]);
  /*
  Add the lines path
   */
  svg.append("path")
     .attr("class", "wind line")
     .attr("d", windline(data));

  svg.append("path")
     .attr("class", "temp line")
     .attr("d", templine(data));

  svg.append("path")
     .attr("class", "hum line")
     .attr("d", humpline(data));

  svg.append("path")
     .attr("class", "rainfall line")
     .attr("d", rainfallline(data));

  svg.append("g")            // Add the X Axis
     .attr("class", "x axis")
     .attr("transform", "translate(0," + height + ")")
     .call(xAxis);
  //Y0
  svg.append("g")
     .attr("class", "y axis temp")
     .call(yAxisLeft);
  //Y1
  svg.append("g")
     .attr("class", "y axis hum")
     .attr("transform", "translate(" + width + " ,0)")
     .call(yAxisRight);
  /*
  tooltip
   */
  d3.select("svg")
  .on("mousemove", function(){
    mousex = d3.mouse(this)[0]-34;
    var xValue = x.invert(mousex);
    var index = bisectDate(data, xValue, 1);
    div.transition()
       .duration(200)
       .style("opacity", .9);
    div.html(
      "<div class='item temp'><i class='wi wi-thermometer'></i><span class='itemname'>Temperature</span>"+data[index].temperature+" C</div>"+
      "<div class='item'><i class='wi wi-humidity'></i><span class='itemname'>Humidity</span>"+data[index].humidity+" %</div>"+
      "<div class='item'><i class='wi wi-barometer'></i><span class='itemname'>Pressure</span>"+data[index].pressure+" mbar</div>"+
      "<div class='item'><i class='wi wi-strong-wind'></i><span class='itemname'>Windspeed</span>"+data[index].wind_speed+" mbar</div>"+
      "<div class='item'><i class='wi wi-wind-direction'></i><span class='itemname'>WindDriection</span>"+data[index].wind_direction+" mbar</div>"+
      "<div class='item'><i class='wi wi-raindrop'></i><span class='itemname'>Rainfall</span>"+data[index].rainfall+" mm</div>"+
      "<div class='item'><i class='wi wi-hail'></i><span class='itemname'>Hail</span>"+data[index].hail+" hits/cm^2</div>"+
      "<div class='item'><i class='wi wi-thermometer-exterior'></i><span class='itemname'>HeaterTemp</span>"+data[index].heater_temp+"  C</div>")
       .style("left", (d3.event.pageX) - 190 + "px")
       .style("top", (d3.event.pageY - 140) + "px")})
  .on("mouseout", function() {
    div.transition()
       .duration(500)
       .style("opacity", 0);
  });
});
function updateChartsData(text) {
  // Get the data again
  d3.tsv("/charts/"+text, function(error, data) {
    data.forEach(function(d) {
    d.date           = new Date(d.timestamp*1000);
    d.temperature    = +d.temperature;
    d.humidity       = +d.humidity;
    d.pressure       = +d.pressure;
    d.wind_speed     = +d.wind_speed;
    d.wind_direction = +d.wind_direction;
    d.rainfall       = +d.rainfall;
    d.heater_temp    = +d.heater_temp;
  });

  // Scale the range of the data again
  x.domain(d3.extent(data, function(d) { return d.date; }));
  y0.domain([0, d3.max(data, function(d) {return Math.max(d.temperature); })]);
  y1.domain([d3.min(data, function(d) {return Math.min(d.humidity); })-1, d3.max(data, function(d) {return Math.max(d.humidity); })]);
  y2.domain([0, 20]);

  // Select the section we want to apply our changes to
  var svg = d3.select("#charts").transition();
  // Make the changes
  svg.select(".wind.line")
     .duration(750)
     .attr("d", windline(data));

  svg.select(".temp.line")
     .duration(750)
     .attr("d", templine(data));

  svg.select(".hum.line")
     .duration(750)
     .attr("d", humpline(data));

  svg.select(".rainfall.line")
     .duration(750)
     .attr("d", rainfallline(data));

  svg.select(".x.axis")
     .duration(750)
     .call(xAxis);
  //Y0
  svg.select(".y.asix.temp")
     .duration(750)
     .call(yAxisLeft);
  //Y1
  svg.select(".y.asix.hum")
     .duration(750)
     .call(yAxisRight);
  });
}
$('.ui.sitedropdown')
.dropdown({
  onChange: function(text) {
    updateChartsData(text);
  }
});
/*var inter = setInterval(function() {
  updateChartsData($('.ui.sitedropdown .selected').data().value);
}, 10000);
*/