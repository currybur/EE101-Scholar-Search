<!DOCTYPE html>
<html> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
<meta charset="utf-8"> 

<head>

<title>Google</title> 

<style type="text/css">
body{
	background-color:grey;
}
.bg {
	background: url(http://bpic.588ku.com/back_pic/00/05/36/855626d37bd8533.jpg!/fh/300/quality/90/unsharp/true/compress/true);
	height:100%;
	text-align: center;
	line-height: 100px;
	z-index:-2
    }
.bg-blur {
	float: left;
	width: 100%;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	-webkit-filter: blur(15px);
	-moz-filter: blur(15px);
	-o-filter: blur(15px);
	-ms-filter: blur(15px);
	filter: blur(15px);
	}
.daohang{
	position:absolute;
	width:100%;
	height:30px;
	background-color:#bdaca8;
}
select{
	height:32px;
	font-size:20px;
	font-family: Georgia;
	color: #eeeeee;
	font-opacity:0.9;
	background-color: rgba(255,255,255,0.1);
	outline:none
}
option{
	color:black;
}
input{
	height:28px;
	width:400px;
	font-family: Georgia;
	color: #eeeeee;
	font-opacity:0.9;
	font-size:20px;
	background-color: rgba(255,255,255,0.1);
	outline:none;
}
input::-webkit-input-placeholder {
	color: grey;
	font-size: 20px;
}
.button{
	height:34px;
	width:120px;
}
.content-front{
	position: absolute;
	left:0%;
	right:0%;
	top:30%;
	z-index:2;
}
.ui-autocomplete {
    max-height: 200px;
	width: 220px;
    overflow-y: auto;
    overflow-x: auto;
  }
.mytitle{
	 font-size:60px;
	 font-family:Georgia;
	 color:#eeeeee 
}
.index{
	position: absolute;
	left:0%;
	right:0%;
	top:40%;
	z-index:-1;
}
.ace-footer{
    width: 100%;
    position: absolute;
    z-index: 3;
    bottom: 0px;
    left: 0;
    overflow: hidden;
    color: white;
    zoom: 1;
    margin: 0;
}
.lin1{
	font-size:25px;
	position:absolute;
	right:0.5%;
	color:white;
	text-decoration: none;
}
.lin2{
	font-size:25px;
	position:absolute;
	right:5%;
	color:white;
	text-decoration: none;
}
.lin3{
	font-size:25px;
	position:absolute;
	right:10.5%;
	color:white;
	text-decoration: none;
}
.lin4{
	font-size:25px;
	position:absolute;
	right:14%;
	color:white;
	text-decoration: none;
}
.lin5{
	font-size:25px;
	position:absolute;
	left:1%;
	color:white;
	text-decoration: none;
}
a:hover{
	color:#f6c4ba;
}
</style>

<script type="text/javascript">
$(function()//default
		{
			$("#key").autocomplete
			({
				source: "hint1.php",
				minLength: 1,
				autoFill: true,
				
			});
		});
function changed(val)
{
	if(val=="Author")//author
	{
		var htm = "<form action='sauthor.php' method='get'><select value = 'Author' id='choice' onchange='changed(this.value)'><option value ='Author'>Author</option><option value ='Paper'>Paper</option><option value='Conference'>Conference</option></select> <input type='text' class='form-control' placeholder='Enter author name. ' id='key' name='key' /> <input name='btnSearch' type='submit' value='Search' class='button'/> <ul id='autoBox'></ul></form>";
		document.getElementById('div1').innerHTML = htm;
		$(function()//change autocomplete
		{
			$("#key").autocomplete
			({
				source: "hint1.php",
				minLength: 1,
				autoFill: true,
				
			});
		});
	}
	else if(val=="Paper")//paper
	{
		var htm = "<form action='spaper.php' method='get'><select value = 'Paper' id='choice' onchange='changed(this.value)'><option value ='Paper'>Paper</option><option value ='Author'>Author</option><option value='Conference'>Conference</option></select> <input type='text' class='form-control' placeholder='Enter paper name. ' id='key' name='key' /> <input name='btnSearch' type='submit' value='Search' class='button'/> <ul id='autoBox'></ul></form>";
		document.getElementById('div1').innerHTML = htm;
		$(function()//change autocomplete
		{
			$("#key").autocomplete
			({
				source: "hint2.php",
				minLength: 1,
				autoFill: true,
				
			});
		});
	}
	else if(val=="Conference")//conference
	{
		var htm = "<form action='sconference.php' method='get'><select value = 'Conference' id='choice' onchange='changed(this.value)'><option value ='Conference'>Conference</option><option value ='Author'>Author</option><option value='Paper'>Paper</option></select> <input type='text' class='form-control' placeholder='Enter conference name. ' id='key' name='key' /> <input name='btnSearch' type='submit' value='Search' class='button'/> <ul id='autoBox'></ul></form>";
		document.getElementById('div1').innerHTML = htm;
		$(function()//change autocomplete
		{
			$("#key").autocomplete
			({
				source: "hint3.php",
				minLength: 1,
				autoFill: true,
				
			});
		});
	}
}
</script>

</head> 

<body> 

<!--background-->
<div class="bg bg-blur"></div>

<!--head-->
<div class="daohang"><div class='lin5'>Welcome, Xiaocheng <a href="index.php">Log out!</a></div><a class='lin4' href="http://acemap.sjtu.edu.cn">Acemap</a><a class="lin1" href="http://www.ieee.org">IEEE</a><a class="lin2" href="http://www.sjtu.edu.cn">SJTU</a>   <a class="lin3" href="http://www.projectmili.com">Mili</a></div>

<!--main part-->
<div class="content-front">
<div align="center"> 

<font class="mytitle" id="mytitle">SEARCH FOR FUN!</font><br/><br/><br/>

<!--search bar-->
<div id="div1" >
<form action="sauthor.php" method="get">
<select id="choice" onchange="changed(this.value)"> 
  <option value ="Author">Author</option>
  <option value ="Paper">Paper</option>
  <option value="Conference">Conference</option>
</select>
<input type="text" class="form-control" placeholder="Enter author name. " id="key" name="key"/>
<input class="button" name="btnSearch" type="submit" value="Search" /> 
<ul id="autoBox">
</ul>
</form>
</div>

<!--node-link graph-->
<div class="index" align="center"><br/><br/>

	<html>
	<head>
	<meta charset="utf-8">
	<style>

	.links line {
	stroke: #999;
	stroke-opacity: 1;
	}

	.nodes circle {
	stroke: #fff;
	stroke-width: 20px;
	}

	</style>
	</head>
	<body marginwidth="0" marginheight="0">
	<svg width="1500" height="600">
	</svg>
	<script src="https://d3js.org/d3.v4.min.js"></script>
	<script>
var svg = d3.select("svg"),
    width = +svg.attr("width"),
    height = +svg.attr("height");

var color = d3.scaleOrdinal(d3.schemeCategory20);

var simulation = d3.forceSimulation()
    .force("link", d3.forceLink().id(function(d) { return d.id; }))
    .force("charge", d3.forceManyBody())
    .force("center", d3.forceCenter(width / 2, height / 2));

d3.json("miserables.json", function(error, graph) {
  if (error) throw error;

  var link = svg.append("g")
      .attr("class", "links")
    .selectAll("line")
    .data(graph.links)
    .enter().append("line")
      .attr("stroke-width", function(d) { return Math.sqrt(d.value); });

  var node = svg.append("g")
      .attr("class", "nodes")
    .selectAll("circle")
    .data(graph.nodes)
    .enter().append("circle")
      .attr("r", 50)
      .attr("fill", function(d) { return color(d.group); })
      .call(d3.drag()
          .on("start", dragstarted)
          .on("drag", dragged)
          .on("end", dragended));

  node.append("title")
      .text(function(d) { return d.id; });

  simulation
      .nodes(graph.nodes)
      .on("tick", ticked);

  simulation.force("link")
      .links(graph.links);

  function ticked() {
    link
        .attr("x1", function(d) { return d.source.x; })
        .attr("y1", function(d) { return d.source.y; })
        .attr("x2", function(d) { return d.target.x; })
        .attr("y2", function(d) { return d.target.y; });

    node
        .attr("cx", function(d) { return d.x; })
        .attr("cy", function(d) { return d.y; });
  }
});

function dragstarted(d) {
  if (!d3.event.active) simulation.alphaTarget(0.3).restart();
  d.fx = d.x;
  d.fy = d.y;
}

function dragged(d) {
  d.fx = d3.event.x;
  d.fy = d3.event.y;
}

function dragended(d) {
  if (!d3.event.active) simulation.alphaTarget(0);
  d.fx = null;
  d.fy = null;
}

</script>
	</body>
	</html>
</div><br/><br/>

</div>
</div>


<footer class="ace-footer">
    <div align="center">
        © Copyright 2018 Group23, Inc. Shanghai Jiao Tong University.
    </div>
</footer>

</body> 

</html> 