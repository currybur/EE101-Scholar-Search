<!DOCTYPE html>
<html> 
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
<meta charset="utf-8"> 
<title>Author's Papers</title> 
<style type="text/css">
body {
	background-color:#fff1ee;
	text-transform:capitalize
	}
.bg {
	background: url(http://bpic.588ku.com/back_pic/04/94/66/3259229882dfe78.jpg!r850/fw/800);
	height:1000px;
	text-align: center;
	line-height: 100px;
	z-index:-1
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
a:link{color:black}
a:visited{color:black}
a:hover{color:grey}
a{TEXT-DECORATION:none}
.demon{
	position:absolute;
	top:20%;
	left:0%;
	right:0%
	z-index:1;
	width:80%
}
.results{
	position: relative;
	left:2%;
	right:2%;
	top:20%;
	z-index:0;
	text-align:center;
	font-size:20px
}
.bt{
	font-family: Georgia;
	font-size:100px;
	position:relative;
	top:20%;
	bottom:20%;
	left:2%;
	right:2%;
}
.buttons{
	position:relative;
	margin-left:70%;
	z-index:2;
}
.bb{
	background-color:rgba(231, 231, 231,0.3);
    border: none;
    color: black;
	font-opacity:0.9;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
	outline:none
}
.bb:hover{
	background-color:grey;
	color:white;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
.searchbar{
	position:absolute;
	top:10%;
	left:0%;
	right:0%;
	width:100%;
	heigh:100%;
	
}
.sear{
	height:58px;
	font-size:30px;
	font-family: Georgia;
	color:black;
	font-opacity:0.9;
	background-color: rgba(255,255,255,0.1);
	outline:none;
}
.but-ton{
	height:58px;
	width:200px;
	font-family: Georgia;
	color: black;;
	font-opacity:0.9;
	font-size:30px;
	background-color: rgba(255,255,255,0.1)
}
input{
	height:52px;
	width:500px;
	font-family: Georgia;
	color: black;;
	font-opacity:0.9;
	font-size:30px;
	background-color: rgba(255,255,255,0.1);
	outline:none
}
input::-webkit-input-placeholder {
	color: grey;
	font-size: 30px;
}
.ui-autocomplete {
    max-height: 200px;
	width: 220px;
    overflow-y: auto;
    overflow-x: auto;
  }
.line_01{
	position:absolute;
	top:19%;
	height:3px;
	width:100%;
	background:black;
	overflow:hidden;
	z-index:3;
 }
 .line_02{
	position:absolute;
	top:8%;
	height:3px;
	width:100%;
	background:black;
	overflow:hidden;
	z-index:3;
 }
.homme{
	position:absolute;
	top:11%;	
	left:8%;
	right:92%;
	font-family: Georgia;
	font-size:40px;
	z-index:1;
 }
 .ace-footer{
    width: 100%;
    position: absolute;
    z-index: 0;
    bottom: -60px;
    left: 0;
    overflow: hidden;
    color: white;
    zoom: 1;
    margin: 0;
}
.index{
	position: absolulte;
	margin-left:100%;
	margin-top:-20%;
	z-index:-1;
	width:300px;
	height:300px;
}


</style>
<script type="text/javascript">
$(function()
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
	if(val=="Author")
	{
		var htm = "<form action='sauthor.php' method='get'><select value = 'Author' id='choice' onchange='changed(this.value)' class='sear'><option value ='Author'>Author</option><option value ='Paper'>Paper</option><option value='Conference'>Conference</option></select> <input type='text' class='form-control' placeholder='Enter author name. ' id='key' name='key' /> <input name='btnSearch' type='submit' value='Search' class='but-ton'/> <ul id='autoBox'></ul></form>";
		document.getElementById('div2').innerHTML = htm;
		$(function()
		{
			$("#key").autocomplete
			({
				source: "hint1.php",
				minLength: 1,
				autoFill: true,
				
			});
		});
	}
	else if(val=="Paper")
	{
		var htm = "<form action='spaper.php' method='get'><select value = 'Paper' id='choice' onchange='changed(this.value)' class='sear'><option value ='Paper'>Paper</option><option value ='Author'>Author</option><option value='Conference'>Conference</option></select> <input type='text' class='form-control' placeholder='Enter paper name. ' id='key' name='key' /> <input name='btnSearch' type='submit' value='Search' class='but-ton'/> <ul id='autoBox'></ul></form>";
		document.getElementById('div2').innerHTML = htm;
		$(function()
		{
			$("#key").autocomplete
			({
				source: "hint2.php",
				minLength: 1,
				autoFill: true,
				
			});
		});
	}
	else if(val=="Conference")
	{
		var htm = "<form action='sconference.php' method='get'><select value = 'Conference' id='choice' onchange='changed(this.value)' class='sear'><option value ='Conference'>Conference</option><option value ='Author'>Author</option><option value='Paper'>Paper</option></select> <input type='text' class='form-control' placeholder='Enter conference name. ' id='key' name='key' /> <input name='btnSearch' type='submit' value='Search' class='but-ton'/> <ul id='autoBox'></ul></form>";
		document.getElementById('div2').innerHTML = htm;
		$(function()
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
<?php
$name = $_GET["new1"];
$nn = $_GET["new2"];
?>
<script type="text/javascript">
var pageNum = 0;
var authorname = "<?php echo $name ?>";
$(function(){
	$("#next").click(function(){
		pageNum++;
		$.ajax({
			type:'POST',
		    url:"author.php",
			data:{'pageNum':pageNum,'name':authorname},
			success:function(result){
				$("#div1").html(result);
		}});		
	});
});

$(function(){
	$("#last").click(function(){		
	    pageNum--;
		$.ajax({
			type:'POST',
		    url:"author.php",
			data:{'pageNum':pageNum,'name':authorname},
			success:function(result){
				$("#div1").html(result);
		}});
		
	});
});
</script>
<body>
<div class="bg bg-blur"></div>
<div class="line_02"></div>
<a href="home.php" class="homme">Home</a>
	<div id="div2" class="searchbar" align="center">
	<form action="sauthor.php" method="get">
	<select id="choice" onchange="changed(this.value)" class="sear""> 
	<option value ="Author">Author</option>
	<option value ="Paper">Paper</option>
	<option value="Conference">Conference</option>
	</select>
	<input type="text" class="form-control" placeholder="Enter author name. " id="key" name="key"/>
	<input class="but-ton" name="btnSearch" type="submit" value="Search" /> 
	<ul id="autoBox">
	</ul>
	</form>
	</div>
<div class="line_01"></div>

<div class="demon">	
	<div class="bt">Papers of <a href='index4.php?aid=<?php echo $nn?>'><?php echo $nn?></a></div>
	<div class='index'>
<html>
<head>
<style>

.links line {
  stroke: #4dd1dd;
  stroke-opacity: 0.6;
}

.nodes circle {
  stroke: #abc;
  stroke-width: 3px;
}
.nodes{
	color:black;
}
body{
	background-color:#fff1ee;
}

</style>
</head>
<body>
<meta charset="utf-8">
<?php
$res['nodes']=array();
$res['links']=array();

$servername = "sqld-gz.bcehost.com";
$username = "fefb13bf9d84473cb488a1b21251f438";
$password = "b932fa0cadf84d2aab73847dc7f02dc9";
$dbname = "ZBhYsGIGOzcPfpGBbAml";
$conn = new mysqli($servername, $username, $password,$dbname);
$a=$name;

mysqli_query($conn , "set names utf8");
$sql="select distinct AuthorID from paper_author_affiliation where PaperID in (select PaperID from paper_author_affiliation where AuthorID='$a')";
$result=$conn->query($sql);
$i=0;
if ($result->num_rows>0){
	while ($row=$result->fetch_assoc()){
		$c=$row['AuthorID'];
		$b=$conn->query("select AuthorName from authors_final where AuthorID='$c'");
		$name=$b->fetch_assoc()['AuthorName'];
		$node['name']=$name;
		$node['id']=$c;
		if ($c==$a) $node['group']=1;
		else $node['group']=2;
		$i++;
array_push($res['nodes'],$node);}}
for ($j=0;$j<$i-1;++$j){
	$d=$res['nodes'][$j]['id'];
	$m=$res['nodes'][$j]['name'];
	for ($k=$j+1;$k<$i;++$k){
		$e=$res['nodes'][$k]['id'];
	$n=$res['nodes'][$k]['name'];
		$sql="select count(*) from papers,paper_author_affiliation where papers.PaperID=paper_author_affiliation.PaperID and paper_author_affiliation.AuthorID='$d' and papers.PaperID in (select PaperID from paper_author_affiliation where AuthorID='$e')";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		$num=$row['count(*)'];
		if ($num>0){
			$link['source']=$d;
			$link['target']=$e;
$link['value']=intval($num);
		
array_push($res['links'],$link);}}}
$file=fopen("b.json","w");
$txt=json_encode($res);
fwrite($file,$txt);
fclose($file);
?>

<svg width="300" height="300"></svg>
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

d3.json("b.json", function(graph) {

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
      .attr("r", 5)
      .attr("fill", function(d) { return color(d.group); })
      .call(d3.drag()
          .on("start", dragstarted)
          .on("drag", dragged)
          .on("end", dragended));

  node.append("title")
      .text(function(d) { return d.name; });

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
</div>

	<div id="div1" class="results"><h2>
<script type="text/javascript">
$(function(){
	$.ajax({
	type:'POST',
	url:"author.php",
	data:{'pageNum':0,'name':authorname},
	success:function(result){
		$("#div1").html(result);
    }});
});

</script>
	</h2>
	</div>
	<div class="buttons">
	<button id="last" class="bb">Previous</button>
	<button id="next" class="bb">Next</button>
	</div>
</div>



</body>
</html> 