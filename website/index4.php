<!DOCTYPE html>  
<html>
<head>

<meta charset="utf-8">  
<title>tree</title>
<style>  
  body{
      background-color:#fff1ee;
  }
	.node {  
	  cursor: pointer;  
	}  
	  
	.node circle {  
	  fill: #fff;  
	  stroke: steelblue;  
	  stroke-width: 1.5px;  
	}  
	  
	.node text {  
	  font: 10px sans-serif;  
	}  
	  
	.link {  
	  fill: none;  
	  stroke: #ccc;  
	  stroke-width: 1.5px;  
	}  
	.tree{
		width: 1800px;
		height: 1100px;
		margin: 0 auto;
		background: #fff1ee;
	}
	.tree svg{
	  	width: 100%;
	  	height: 100%;
	}
  .biaoti{
	z-index:5;
	position:absolute;
	top:0%;
	bottom:5%;
	font-size:60px;
	height:70px;
	text-transform:capitalize
  }
</style>  
</head>
<body>  
<?php
	$nn = $_GET['aid'];
?>
	<div class="tree" id="tree"></div>
	<div class="biaoti">Mentoring Relationship Tree of <?php echo $nn?></div>
<script src="http://apps.bdimg.com/libs/d3/3.4.8/d3.min.js"></script>  
<script> 
var json=[
{"name":"James P Delgrande",
 "parent":"null",
 "children":[
{"name":'diana cukierman',
'parent':"James P Delgrande"},
{"name":"abhaya c nayak",
'parent':"James P Delgrande",
'children':[{'name':'yin chen','parent':"abhaya c nayak"},{'name':'rex kwok','parent':"abhaya c nayak"},{'name':'mikhail prokopenko','parent':"abhaya c nayak"},{'name':'zhiqiang zhuang','parent':"abhaya c nayak"},{'name':'kinzang chhogyal','parent':"abhaya c nayak"}]},
{"name":'maurice pagnucco',
'parent':"James P Delgrande",
'children':[{'name':'tim van allen','parent':'maurice pagnucco'},{'name':'murray patterson','parent':'maurice pagnucco'}]},
{'name':'arvind gupta',
'parent':"James P Delgrande"},
{'name':'yi jin',
'parent':"James P Delgrande"},
{'name':'aaron hunter',
'parent':"James P Delgrande"},
{'name':'javier romero',
'parent':"James P Delgrande"},
{'name':'chris groeneboer',
'parent':"James P Delgrande"},
{'name':'aaron hunter',
'parent':"James P Delgrande"},
{'name':"tim van allen",
'parent':"James P Delgrande"},
{'name':'jerome lang',
'parent':"James P Delgrande"},
{'name':'giacomo bonanno',
'parent':"James P Delgrande"},
{'name':'hans rott',
'parent':"James P Delgrande"},
{'name':'aaron hunter',
'parent':"James P Delgrande",
'children':[{'name':'ray young','parent':'aaron hunter'}]},
{'name':'aaron hunter',
'parent':"James P Delgrande"},
{'name':'arran hunter',
'parent':"James P Delgrande"},
{'name':'zhe wang',
'parent':"James P Delgrande"},
{'name':'zhiqiang zhuang',
'parent':"James P Delgrande"},
{'name':'bryan renne',
'parent':"James P Delgrande"},
{'name':'mehrdad oveisi',
'parent':"James P Delgrande"}]}];

  
  
	var margin = [20, 120, 20, 120],
	    width = document.getElementById("tree").offsetWidth,
	    height = document.getElementById("tree").offsetHeight; 
	      
	var i = 0,  
	    duration = 750,  
	    root;  
	  
	var tree = d3.layout.tree()  
	    .size([height, width]);  
	  
	var diagonal = d3.svg.diagonal()  
	    .projection(function(d) { return [d.y, d.x]; });  
	  
	var zoom = d3.behavior.zoom().scaleExtent([0.1, 100]).on("zoom", zoomed);//添加放大缩小事件
	  
	var svg = d3.select("body").select("#tree").append("svg")
	.call(zoom)//给svg绑定zoom事件
	  .append("g")  
	  .call(zoom)//给g绑定zoom事件
	  .append("g")
	    .attr("transform", "translate(" + margin[3] + "," + margin[0] + ")");  

      
	  root = json[0];  
	  root.x0 = height / 2;  
	  root.y0 = 0;  
	  
	  function collapse(d) {  
	    if (d.children) {  
	      d._children = d.children;  
	      d._children.forEach(collapse);  
	      d.children = null;  
	    }  
	  }  
	  
	  root.children.forEach(collapse);  
	  update(root);  
	  
	function zoomed() {
	    svg.attr("transform",
	        "translate(" + zoom.translate() + ")" +
	        "scale(" + zoom.scale() + ")"
	    );
	}
	  
	function update(source) {  
	  
	  // Compute the new tree layout.  
	  var nodes = tree.nodes(root).reverse(),  
	      links = tree.links(nodes);  
	  
	  // Normalize for fixed-depth.  
	  nodes.forEach(function(d) { d.y = d.depth * 180; });  
	  
	  // Update the nodes…  
	  var node = svg.selectAll("g.node")  
	      .data(nodes, function(d) { return d.id || (d.id = ++i); });  
	  
	  // Enter any new nodes at the parent's previous position.  
	  var nodeEnter = node.enter().append("g")  
	      .attr("class", "node")  
	      .attr("transform", function(d) { return "translate(" + source.y0 + "," + source.x0 + ")"; })  
	      .on("click", click);  
	  
	  nodeEnter.append("circle")  
	      .attr("r", 1e-6)  
	      .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });  
	  
	  nodeEnter.append("text")  
	      .attr("x", function(d) { return d.children || d._children ? -10 : 10; })  
	      .attr("dy", ".35em")  
	      .attr("text-anchor", function(d) { return d.children || d._children ? "end" : "start"; })  
	      .text(function(d) { return d.name; })  
	      .style("fill-opacity", 1e-6);  
	  
	  var nodeUpdate = node.transition()  
	      .duration(duration)  
	      .attr("transform", function(d) { return "translate(" + d.y + "," + d.x + ")"; });  
	  
	  nodeUpdate.select("circle")  
	      .attr("r", 4.5)  
	      .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });  
	  
	  nodeUpdate.select("text")  
	      .style("fill-opacity", 1);  
	  
	  var nodeExit = node.exit().transition()  
	      .duration(duration)  
	      .attr("transform", function(d) { return "translate(" + source.y + "," + source.x + ")"; })  
	      .remove();  
	  
	  nodeExit.select("circle")  
	      .attr("r", 1e-6);  
	  
	  nodeExit.select("text")  
	      .style("fill-opacity", 1e-6);  
	  
	  var link = svg.selectAll("path.link")  
	      .data(links, function(d) { return d.target.id; });  
	  
	  link.enter().insert("path", "g")  
	      .attr("class", "link")  
	      .attr("d", function(d) {  
	        var o = {x: source.x0, y: source.y0};  
	        return diagonal({source: o, target: o});  
	      });  
	    
	  link.transition()  
	      .duration(duration)  
	      .attr("d", diagonal);  
	    
	  link.exit().transition()  
	      .duration(duration)  
	      .attr("d", function(d) {  
	        var o = {x: source.x, y: source.y};  
	        return diagonal({source: o, target: o});  
	      })  
	      .remove();  
	   
	  nodes.forEach(function(d) {  
	    d.x0 = d.x;  
	    d.y0 = d.y;  
	  });  
	}  
	  
	function click(d) {  
	  if (d.children) {  
	    d._children = d.children;  
	    d.children = null;  
	  } else {  
	    d.children = d._children;  
	    d._children = null;  
	  }  
	  update(d);  
	}  
  
</script>  
</body>
</html>